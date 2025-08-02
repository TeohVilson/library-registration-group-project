@extends('layouts.auth')

@section('content')
<div class="auth-form-wrapper">
    <div class="card">
        <div class="card-header">
            <h1>Manage Loans</h1>
            <a href="{{ route('admin.dashboard') }}" class="back-button">
                <i class="fas fa-arrow-left"></i> Back to Dashboard
            </a>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('warning'))
                <div class="alert alert-warning">
                    {{ session('warning') }}
                </div>
            @endif

            @if(session('info'))
                <div class="alert alert-info">
                    {{ session('info') }}
                </div>
            @endif

            @if($loans->count() > 0)
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Book</th>
                                <th>Loan Date</th>
                                <th>Due Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($loans as $loan)
                                <tr>
                                    <td>
                                        @if($loan->user)
                                            {{ $loan->user->name }}
                                        @else
                                            <span class="text-muted">User deleted</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($loan->book)
                                            {{ $loan->book->title }}
                                        @else
                                            <span class="text-muted">Book deleted</span>
                                        @endif
                                    </td>
                                    <td>{{ $loan->loan_date->format('M d, Y') }}</td>
                                    <td>{{ $loan->due_date->format('M d, Y') }}</td>
                                    <td>
                                        <span class="status-badge status-{{ strtolower($loan->status) }}">
                                            {{ strtoupper($loan->status) }}
                                        </span>
                                    </td>
                                    <td class="actions">
                                        @if($loan->book && $loan->user)
                                            @can('markAsPickedUp', $loan)
                                                <form action="{{ route('admin.loans.pickup', $loan->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="action-btn pickup-btn">Mark as Picked Up</button>
                                                </form>
                                            @endif
                                            @can('markAsReturned', $loan)
                                                <form action="{{ route('admin.loans.return', $loan->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="action-btn return-btn">Mark as Returned</button>
                                                </form>
                                            @endif
                                        @else
                                            <span class="text-muted">No actions available</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="no-loans">
                    <p>No loans found.</p>
                </div>
            @endif
        </div>
    </div>
</div>

<style>
    .auth-form-wrapper {
        width: 80%;
        margin: 20px auto;
        padding: 20px;
    }

    .card {
        background: white;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .card-header {
        padding: 20px;
        border-bottom: 1px solid #eee;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .card-header h1 {
        margin: 0;
        font-size: 24px;
        color: #333;
    }

    .back-button {
        padding: 8px 16px;
        background-color: #6c757d;
        color: white;
        text-decoration: none;
        border-radius: 4px;
        font-size: 14px;
    }

    .back-button:hover {
        background-color: #5a6268;
        color: white;
        text-decoration: none;
    }

    .card-body {
        padding: 20px;
    }

    .alert {
        padding: 12px 20px;
        margin-bottom: 20px;
        border-radius: 4px;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .alert-warning {
        background-color: #fff3cd;
        color: #856404;
        border: 1px solid #ffeeba;
    }

    .alert-info {
        background-color: #cce5ff;
        color: #004085;
        border: 1px solid #b8daff;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        background-color: white;
    }

    .table th,
    .table td {
        padding: 12px 16px;
        text-align: left;
        border-bottom: 1px solid #e9ecef;
        vertical-align: middle;
        height: 60px;
    }

    .table th {
        background-color: #f8f9fa;
        font-weight: 600;
        color: #495057;
        border-top: 1px solid #e9ecef;
    }

    .table tr:last-child td {
        border-bottom: none;
    }

    .status-badge {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 16px;
        font-size: 12px;
        font-weight: 500;
        letter-spacing: 0.5px;
    }

    .status-borrowed {
        background-color: #cce5ff;
        color: #004085;
    }

    .status-returned {
        background-color: #e3f3e6;
        color: #1e7e34;
    }

    .status-overdue {
        background-color: #f8d7da;
        color: #721c24;
    }

    .status-waiting_pickup {
        background-color: #fff3cd;
        color: #856404;
    }

    .actions {
        display: flex;
        gap: 8px;
        height: 100%;
        align-items: center;
    }

    .action-btn {
        padding: 6px 12px;
        border-radius: 4px;
        font-size: 12px;
        cursor: pointer;
        border: none;
        font-weight: 500;
        white-space: nowrap;
        transition: background-color 0.2s;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .pickup-btn {
        background-color: #ffc107;
        color: #000;
    }

    .return-btn {
        background-color: #28a745;
        color: white;
    }

    .pickup-btn:hover {
        background-color: #e0a800;
    }

    .return-btn:hover {
        background-color: #218838;
    }

    .no-loans {
        text-align: center;
        padding: 30px;
        color: #6c757d;
        font-style: italic;
    }

    .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        border-radius: 8px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }

    .text-muted {
        color: #6c757d;
        font-style: italic;
        font-size: 0.9em;
    }
</style>
@endsection 