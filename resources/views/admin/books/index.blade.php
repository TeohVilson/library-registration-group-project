@extends('layouts.auth')

@section('content')
<div class="auth-form-wrapper">
    <div class="card">
        <div class="card-header">
            <h1>Manage Books</h1>
            <div class="header-actions flex flex-row" style="justify-content: space-between;">
                @can('create', App\Models\Book::class)
                    <a href="{{ route('admin.books.create') }}" class="create-btn">Add New Book</a>
                @endif
                <a href="{{ route('admin.dashboard') }}" class="back-btn">
                    <i class="fas fa-arrow-left"></i> Back to Dashboard
                </a>
            </div>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($books->count() > 0)
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Publisher</th>
                                <th>Year</th>
                                <th>Stock</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($books as $book)
                                <tr>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->author_name }}</td>
                                    <td>{{ $book->publisher }}</td>
                                    <td>{{ $book->year_published }}</td>
                                    <td>{{ $book->stock }}</td>
                                    <td class="actions">
                                        @can('update', $book)
                                            <a href="{{ route('admin.books.edit', $book->id) }}" class="edit-btn">Edit</a>
                                        @endif
                                        @can('delete', $book)
                                            <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="no-books">
                    <p>No books found.</p>
                </div>
            @endif
        </div>
    </div>
</div>

<style>
    .header-actions {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .create-btn {
        padding: 8px 16px;
        background-color: #4CAF50;
        color: white;
        text-decoration: none;
        border-radius: 4px;
        font-size: 14px;
    }

    .create-btn:hover {
        background-color: #45a049;
    }

    .back-btn {
        padding: 8px 16px;
        background-color: #6c757d;
        color: white;
        text-decoration: none;
        border-radius: 4px;
        font-size: 14px;
    }

    .back-btn:hover {
        background-color: #5a6268;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .table th,
    .table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .table th {
        background-color: #f5f5f5;
        font-weight: bold;
    }

    .actions {
        display: flex;
        gap: 10px;
    }

    .edit-btn,
    .delete-btn {
        padding: 6px 12px;
        border-radius: 4px;
        font-size: 14px;
        cursor: pointer;
        text-decoration: none;
    }

    .edit-btn {
        background-color: #ffc107;
        color: #000;
    }

    .delete-btn {
        background-color: #dc3545;
        color: white;
        border: none;
    }

    .edit-btn:hover {
        background-color: #e0a800;
    }

    .delete-btn:hover {
        background-color: #c82333;
    }

    .no-books {
        text-align: center;
        padding: 30px;
        color: #666;
    }

    .auth-form-wrapper {
    width: 60%;
    margin: 20px auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);}

</style>
@endsection
