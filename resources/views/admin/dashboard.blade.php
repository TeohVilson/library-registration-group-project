@extends('layouts.auth')

@section('content')
<div class="auth-form-wrapper">
    <h1>Library Admin Dashboard – Welcome, {{ Auth::user()->name }}</h1>

    {{-- Admin Action Cards --}}
    <div class="admin-cards">
        <div class="admin-card">
            <h3>Manage Books</h3>
            <p>Add, edit, or remove books from the library.</p>
            <a href="{{ route('admin.books.index') }}" class="btn-custom btn-primary-custom">Manage Books</a>
        </div>
        
        <div class="admin-card">
            <h3>Manage Loans</h3>
            <p>View and manage all book loans in the system.</p>
            <a href="{{ route('admin.loans.index') }}" class="btn-custom btn-secondary-custom">View All Loans</a>
        </div>
        
        <div class="admin-card">
            <h3>Manage Users</h3>
            <p>View and manage all registered users.</p>
            <a href="{{ route('admin.users.index') }}" class="btn-custom btn-info-custom">Manage Users</a>
        </div>
    </div>
</div>

<style>
    .auth-form-wrapper {
        width: 80%;
        margin: 20px auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    h1 {
        text-align: center;
        font-size: 32px;
        margin-bottom: 20px;
        color: #333;
    }

    .admin-cards {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
        margin-top: 30px;
    }

    .admin-card {
        background: white;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        padding: 20px;
        width: 300px;
        text-align: center;
        transition: transform 0.3s ease;
    }

    .admin-card:hover {
        transform: translateY(-5px);
    }

    .admin-card h3 {
        color: #333;
        margin-bottom: 10px;
    }

    .admin-card p {
        color: #666;
        margin-bottom: 20px;
        font-size: 14px;
    }

    .btn-custom {
        padding: 10px 20px;
        font-size: 14px;
        text-decoration: none;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        color: white;
        display: inline-block;
        text-align: center;
        width: 100%;
    }

    .btn-primary-custom {
        background-color: #4CAF50;
    }

    .btn-secondary-custom {
        background-color: #6c757d;
    }

    .btn-info-custom {
        background-color: #17a2b8;
    }

    .btn-custom:hover {
        opacity: 0.9;
    }

    p {
        font-size: 14px;
        color: #666;
    }
</style>
@endsection


