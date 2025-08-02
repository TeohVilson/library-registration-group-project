@extends('layouts.auth')

@section('content')
<div class="auth-form-wrapper">
    <div class="card">
        <div class="card-header">
            <h1>My Loans</h1>
            <a href="{{ route('home') }}" class="back-btn">
                <i class="fas fa-arrow-left"></i> Back to Dashboard
            </a>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($loans->count() > 0)
                <div class="loans-list">
                    @foreach($loans as $loan)
                        <div class="loan-card">
                            <div class="loan-info">
                                @if($loan->book)
                                    <h4>{{ $loan->book->title }}</h4>
                                    <p><strong>Author:</strong> {{ $loan->book->author_name }}</p>
                                @else
                                    <h4>Book Details Unavailable</h4>
                                    <p class="text-muted">This book has been removed from the database</p>
                                @endif
                                <p><strong>Loan Date:</strong> {{ $loan->loan_date->format('M d, Y') }}</p>
                                <p><strong>Due Date:</strong> {{ $loan->due_date->format('M d, Y') }}</p>
                                <p><strong>Status:</strong> 
                                    @if($loan->status == 'borrowed')
                                        <span class="status-badge status-borrowed">Awaiting Return</span>
                                    @elseif($loan->status == 'returned')
                                        <span class="status-badge status-returned">Returned on {{ $loan->return_date->format('M d, Y') }}</span>
                                    @elseif($loan->status == 'waiting_pickup')
                                        <span class="status-badge status-waiting">Waiting for Pickup</span>
                                    @else
                                        <span class="status-badge status-overdue">Overdue</span>
                                    @endif
                                </p>
                            </div>
                            
                            <div class="loan-actions">
                                @if($loan->status == 'waiting_pickup' && $loan->book)
                                    <span class="pickup-info">Please collect your book from the library</span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="no-loans">
                    <p>You don't have any loans at the moment.</p>
                    <a href="{{ route('books.search') }}" class="browse-btn">Browse Books</a>
                </div>
            @endif
        </div>
    </div>
</div>

<style>
    .auth-form-wrapper {
    width: 60%;
    margin: 20px auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);}
    .loans-list {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .loan-card {
        background: #f9f9f9;
        padding: 15px;
        border-radius: 6px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .loan-info {
        flex: 1;
    }

    .loan-info h4 {
        margin-top: 0;
        margin-bottom: 10px;
        font-size: 18px;
        color: #333;
    }

    .loan-info p {
        margin: 5px 0;
        font-size: 14px;
        color: #555;
    }

    .text-muted {
        color: #6c757d;
        font-style: italic;
    }

    .loan-actions {
        margin-left: 15px;
    }

    .submit-btn {
        padding: 8px 15px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
    }

    .submit-btn:hover {
        background-color: #45a049;
    }

    .status-badge {
        display: inline-block;
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: bold;
    }

    .status-borrowed {
        background-color: #cce5ff;
        color: #004085;
    }

    .status-returned {
        background-color: #d4edda;
        color: #155724;
    }

    .status-overdue {
        background-color: #f8d7da;
        color: #721c24;
    }

    .status-waiting {
        background-color: #fff3cd;
        color: #856404;
    }

    .pickup-info {
        display: inline-block;
        padding: 8px 15px;
        background-color: #fff3cd;
        color: #856404;
        border-radius: 4px;
        font-size: 14px;
    }

    .no-loans {
        text-align: center;
        padding: 30px;
        color: #666;
    }

    .browse-btn {
        display: inline-block;
        margin-top: 15px;
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        text-decoration: none;
        border-radius: 4px;
        font-size: 16px;
    }

    .browse-btn:hover {
        background-color: #45a049;
    }

    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 4px;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px;
    }

    .card-header h1 {
        margin: 0;
        font-size: 24px;
        color: #333;
    }

    .back-btn {
        display: inline-flex;
        align-items: center;
        padding: 8px 16px;
        background-color: #6c757d;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
        margin-left: 15px;
        margin-right: 15px;
    }

    .back-btn:hover {
        background-color: #5a6268;
    }

    .back-btn i {
        margin-right: 8px;
    }
</style>
@endsection 