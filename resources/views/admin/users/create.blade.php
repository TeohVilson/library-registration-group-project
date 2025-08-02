@extends('layouts.auth')

@section('content')
<h1>Add New User</h1>

<div class="auth-form-wrapper">
    @if($errors->any())
        <div class="error-message">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="name">Full Name:</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required
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
            <label for="password_confirmation">Confirm Password:</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required
                class="@error('password_confirmation') is-invalid @enderror">
            @error('password_confirmation')
                <span class="error-text">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="is_admin">User Role:</label>
            <select id="is_admin" name="is_admin" required class="@error('is_admin') is-invalid @enderror">
                <option value="0" {{ old('is_admin') == '0' ? 'selected' : '' }}>Regular User</option>
                <option value="1" {{ old('is_admin') == '1' ? 'selected' : '' }}>Administrator</option>
            </select>
            @error('is_admin')
                <span class="error-text">{{ $message }}</span>
            @enderror
        </div>

        <div class="button-group">
            <button type="submit" class="submit-btn">Create User</button>
            <a href="{{ route('admin.users.index') }}" class="cancel-btn">Cancel</a>
        </div>
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

    .form-group input, .form-group select {
        width: 100%;
        padding: 10px;
        font-size: 14px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .form-group input:focus, .form-group select:focus {
        border-color: #4CAF50;
        outline: none;
    }

    .button-group {
        display: flex;
        gap: 10px;
        margin-top: 10px;
    }

    .submit-btn, .cancel-btn {
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        flex: 1;
        text-align: center;
        text-decoration: none;
    }

    .submit-btn {
        background-color: #4CAF50;
        color: white;
    }

    .submit-btn:hover {
        background-color: #45a049;
    }

    .cancel-btn {
        background-color: #f44336;
        color: white;
    }

    .cancel-btn:hover {
        background-color: #d32f2f;
    }

    .error-text {
        color: red;
        font-size: 12px;
    }

    .error-message {
        background-color: #ffebee;
        color: #c62828;
        padding: 10px;
        border-radius: 4px;
        margin-bottom: 15px;
    }

    .error-message ul {
        margin: 0;
        padding-left: 20px;
    }

    h1 {
        text-align: center;
        font-size: 32px;
    }
</style>
@endsection 