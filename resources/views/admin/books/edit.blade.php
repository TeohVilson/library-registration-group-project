@extends('layouts.auth')

@section('content')
<div class="auth-form-wrapper">
    <div class="header-section">
        <h1>Edit Book</h1>
        <a href="{{ route('admin.books.index') }}" class="back-btn">Back to Books</a>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close-btn" onclick="this.parentElement.style.display='none';">&times;</button>
        </div>
    @endif

    <div class="edit-book-card">
        <form action="{{ route('admin.books.update', $book) }}" method="POST" class="edit-book-form">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="title">Book Title:</label>
                <input type="text" name="title" value="{{ old('title', $book->title) }}" placeholder="Enter book title" required>
            </div>
            
            <div class="form-group">
                <label for="author_name">Author Name:</label>
                <input type="text" name="author_name" value="{{ old('author_name', $book->author_name) }}" placeholder="Enter author name" required>
            </div>
            
            <div class="form-group">
                <label for="publisher">Publisher:</label>
                <input type="text" name="publisher" value="{{ old('publisher', $book->publisher) }}" placeholder="Enter publisher name" required>
            </div>
            
            <div class="form-group">
                <label for="year_published">Year Published:</label>
                <input type="number" name="year_published" value="{{ old('year_published', $book->year_published) }}" placeholder="Enter publication year" required>
            </div>
            
            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="number" name="stock" value="{{ old('stock', $book->stock) }}" placeholder="Enter available stock" required>
            </div>

            <button type="submit" class="submit-btn">Update Book</button>
        </form>
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

    .header-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }

    h1 {
        margin: 0;
        font-size: 32px;
        color: #333;
    }

    .back-btn {
        padding: 10px 20px;
        background-color: #6c757d;
        color: white;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        font-size: 16px;
    }

    .back-btn:hover {
        background-color: #5a6268;
    }

    .edit-book-card {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        padding: 20px;
    }

    .edit-book-form {
        max-width: 600px;
        margin: 0 auto;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #333;
    }

    .form-group input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 14px;
    }

    .form-group input:focus {
        border-color: #4CAF50;
        outline: none;
        box-shadow: 0 0 0 2px rgba(76, 175, 80, 0.2);
    }

    .submit-btn {
        width: 100%;
        padding: 12px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .submit-btn:hover {
        background-color: #45a049;
    }

    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 4px;
        position: relative;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    .alert ul {
        margin: 0;
        padding-left: 20px;
    }

    .close-btn {
        position: absolute;
        right: 10px;
        top: 10px;
        background: none;
        border: none;
        font-size: 20px;
        cursor: pointer;
        color: #721c24;
    }
</style>
@endsection 