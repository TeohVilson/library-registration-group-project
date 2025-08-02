@extends('layouts.auth')

@section('content')
<div class="auth-form-wrapper">
    <h1>Library Dashboard – Welcome, {{ Auth::user()->name }}</h1>

    <div class="dashboard-cards">
        {{-- Search Book Card --}}
        <a href="{{ route('books.search') }}" class="dashboard-card">
            <div class="card-icon">
                <i class="fas fa-search"></i>
            </div>
            <div class="card-content">
                <h3>Search Book</h3>
                <p>Find and borrow books from our library collection</p>
            </div>
        </a>

        {{-- My Loans Card --}}
        <a href="{{ route('loans.index') }}" class="dashboard-card">
            <div class="card-icon">
                <i class="fas fa-book-reader"></i>
            </div>
            <div class="card-content">
                <h3>My Loans</h3>
                <p>View your current and past book loans</p>
            </div>
        </a>

        {{-- Profile Card --}}
        <a href="{{ route('profile') }}" class="dashboard-card">
            <div class="card-icon">
                <i class="fas fa-user"></i>
            </div>
            <div class="card-content">
                <h3>My Profile</h3>
                <p>View your account information</p>
            </div>
        </a>
    </div>
</div>

<style>
    .auth-form-wrapper {
        width: 60%;
        margin: 20px auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    h1 {
        text-align: center;
        font-size: 32px;
        margin-bottom: 30px;
        color: #333;
    }

    .dashboard-cards {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 20px;
        margin-top: 20px;
    }

    .dashboard-card {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        padding: 20px;
        display: flex;
        align-items: center;
        text-decoration: none;
        color: inherit;
        transition: transform 0.3s, box-shadow 0.3s;
        width: 90%;
        max-width: 500px;
    }

    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .card-icon {
        background-color: #4CAF50;
        color: white;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
        font-size: 20px;
    }

    .card-content {
        flex: 1;
    }

    .card-content h3 {
        margin: 0 0 5px 0;
        font-size: 18px;
        color: #333;
    }

    .card-content p {
        margin: 0;
        font-size: 14px;
        color: #666;
    }
</style>
@endsection



