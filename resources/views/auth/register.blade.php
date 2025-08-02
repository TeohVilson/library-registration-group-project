@extends('layouts.app')

@section('content')
<h1>Register</h1>

<div class="auth-form-wrapper">
    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
        @csrf

        <div class="form-group">
            <label for="name">Name:</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                class="@error('name') is-invalid @enderror">
            @error('name')
                <span class="error-text">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="username">Username:</label>
            <input id="username" type="text" name="username" value="{{ old('username') }}" required
                class="@error('username') is-invalid @enderror">
            @error('username')
                <span class="error-text">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email Address:</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                class="@error('email') is-invalid @enderror">
            @error('email')
                <span class="error-text">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input id="password" type="password" name="password" required
                class="@error('password') is-invalid @enderror">
            @error('password')
                <span class="error-text">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password-confirm">Confirm Password:</label>
            <input id="password-confirm" type="password" name="password_confirmation" required>
        </div>

        <button type="submit" class="submit-btn">Register</button>
    </form>
</div>

<style>
    .auth-form-wrapper {
        width: 50%;
        margin: 20px auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        font-size: 14px;
        font-weight: bold;
        margin-bottom: 5px;
        display: block;
    }

    .form-group input {
        width: 100%;
        padding: 10px;
        font-size: 14px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .form-group input:focus {
        border-color: #4CAF50;
        outline: none;
    }

    .submit-btn {
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        width: 100%;
        margin-top: 10px;
    }

    .submit-btn:hover {
        background-color: #45a049;
    }

    .error-text {
        color: red;
        font-size: 12px;
    }

    h1 {
        text-align: center;
        font-size: 32px;
    }
</style>
@endsection
