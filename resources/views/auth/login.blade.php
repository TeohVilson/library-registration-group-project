@extends('layouts.app')

@section('content')
<h1>Login</h1>

<div class="auth-form-wrapper">
    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
        @csrf

        <div class="form-group">
            <label for="email">Email:</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
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

        <div class="form-group checkbox-group">
            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label for="remember">Remember Me</label>
        </div>

        <button type="submit" class="submit-btn">Login</button>
    </form>

    @if(session('error'))
        <div class="error-message">
            {{ session('error') }}
        </div>
    @endif
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
    .form-group input[type="email"],
    .form-group input[type="password"] {
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
    .checkbox-group {
        display: flex;
        align-items: center;
    }
    .checkbox-group input {
        width: auto;
        margin-right: 10px;
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
    .error-message {
        margin-top: 15px;
        padding: 10px;
        background-color: #ffebee;
        color: #c62828;
        border-radius: 4px;
        text-align: center;
        font-size: 14px;
    }
    h1 {
        text-align: center;
        font-size: 32px;
    }
</style>
@endsection
