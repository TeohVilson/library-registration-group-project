@extends('layouts.auth')

@section('content')
<div class="auth-form-wrapper">
    <div class="card">
        <div class="card-header">
            <h1>My Profile</h1>
            <a href="{{ route('home') }}" class="back-button">
                <i class="fas fa-arrow-left"></i> Back to Dashboard
            </a>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('profile.update') }}" class="profile-form">
                @csrf
                @method('PUT')
                
                <div class="profile-info">
                    <div class="info-group">
                        <label>Email:</label>
                        <input type="email" value="{{ auth()->user()->email }}" 
                               class="form-control" disabled>
                        <small class="text-muted">Email cannot be changed</small>
                    </div>
                    
                    <div class="info-group">
                        <label>Name:</label>
                        <input type="text" name="name" value="{{ auth()->user()->name }}" 
                               class="form-control @error('name') is-invalid @enderror" required>
                        @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="info-group">
                        <label>Username:</label>
                        <input type="text" name="username" value="{{ auth()->user()->username }}" 
                               class="form-control @error('username') is-invalid @enderror" required>
                        @error('username')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="profile-actions">
                    <button type="submit" class="save-btn">
                        <i class="fas fa-save"></i> Save Changes
                    </button>
                </div>
            </form>
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

    .profile-info {
        margin: 20px 0;
    }

    .info-group {
        margin-bottom: 15px;
        padding: 10px;
        background-color: #f8f9fa;
        border-radius: 5px;
    }

    .info-group label {
        display: block;
        font-weight: bold;
        color: #666;
        margin-bottom: 5px;
    }

    .form-control {
        width: 100%;
        padding: 8px 12px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 14px;
        background-color: white;
    }

    .form-control:disabled {
        background-color: #e9ecef;
        cursor: not-allowed;
    }

    .form-control:focus {
        border-color: #4CAF50;
        outline: none;
        box-shadow: 0 0 0 2px rgba(76, 175, 80, 0.2);
    }

    .is-invalid {
        border-color: #dc3545;
    }

    .invalid-feedback {
        color: #dc3545;
        font-size: 12px;
        margin-top: 5px;
        display: block;
    }

    .text-muted {
        color: #6c757d;
        font-size: 12px;
        margin-top: 5px;
        display: block;
    }

    .profile-actions {
        margin-top: 20px;
        text-align: right;
    }

    .save-btn {
        display: inline-flex;
        align-items: center;
        padding: 8px 16px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
        transition: background-color 0.3s;
    }

    .save-btn:hover {
        background-color: #45a049;
    }

    .save-btn i {
        margin-right: 8px;
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

    .back-button {
        display: inline-flex;
        align-items: center;
        padding: 8px 16px;
        background-color: #4CAF50;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .back-button:hover {
        background-color: #45a049;
    }

    .back-button i {
        margin-right: 8px;
    }
</style>
@endsection 