<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    // Index method for listing all books
    public function index()
    {
        $this->authorize('viewAny', Book::class);
        $books = Book::all();
        return view('admin.books.index', compact('books'));
    }

    //create operation:add book
    public function createBook(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'author_name' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'year_published' => 'required|integer|digits:4',
            'stock' => 'required|integer|min:1',
        ]);

        // Create a new book record
        $book = Book::create([
            'title' => $request->title,
            'author_name' => $request->author_name,
            'publisher' => $request->publisher,
            'year_published' => $request->year_published,
            'stock' => $request->stock,
        ]);

        // Return a response or redirect
        return redirect()->route('admin.books.index');
    }

    public function create()
    {
        $this->authorize('create', Book::class);
        return view('admin.books.create'); // This returns the 'create' view (the form for creating a new book)
    }

    //read operation:show all books
    public function showBooks()
    {
        $books = Book::all(); // Retrieve all books from the database
        return view('admin.books.index', compact('books')); // Pass to the view
    }

    public function search(Request $request)
    {
        $this->authorize('viewAny', Book::class);
        $query = $request->input('query');
        $books = Book::where('title', 'like', "%{$query}%")
                    ->orWhere('author_name', 'like', "%{$query}%")
                    ->orWhere('publisher', 'like', "%{$query}%")
                    ->get();
        
        return view('search', compact('books', 'query'));
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $this->authorize('update', $book);
        return view('admin.books.edit', compact('book')); // Return the edit form with the book data
    }

    //update operation:edit book
    public function updateBook(Request $request, $id)
    {
        $book = Book::findOrFail($id); // Find the book by its ID

        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'author_name' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'year_published' => 'required|integer|digits:4',
            'stock' => 'required|integer|min:1',
        ]);

        // Update the book record
        $book->update([
            'title' => $request->title,
            'author_name' => $request->author_name,
            'publisher' => $request->publisher,
            'year_published' => $request->year_published,
            'stock' => $request->stock,
        ]);

        // Redirect after the update
        return redirect()->route('admin.books.index');
    }

    //delete operation:delete book
    public function deleteBook($id)
    {
        $book = Book::findOrFail($id); // Find the book by its ID
    
        // Delete the book record
        $book->delete();
    
        // Redirect to the list of books
        return redirect()->route('admin.books.index');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Book::class);
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'author_name' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'year_published' => 'required|integer|digits:4',
            'stock' => 'required|integer|min:1',
        ]);

        // Create a new book record
        Book::create([
            'title' => $request->title,
            'author_name' => $request->author_name,
            'publisher' => $request->publisher,
            'year_published' => $request->year_published,
            'stock' => $request->stock,
        ]);

        return redirect()->route('admin.books.index')->with('success', 'Book created successfully!');
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $this->authorize('update', $book);
        $request->validate([
            'title' => 'required|string|max:255',
            'author_name' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'year_published' => 'required|integer|digits:4',
            'stock' => 'required|integer|min:1',
        ]);

        $book->update([
            'title' => $request->title,
            'author_name' => $request->author_name,
            'publisher' => $request->publisher,
            'year_published' => $request->year_published,
            'stock' => $request->stock,
        ]);

        return redirect()->route('admin.books.index')->with('success', 'Book updated successfully!');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $this->authorize('delete', $book);
        $book->delete();

        return redirect()->route('admin.books.index')->with('success', 'Book deleted successfully!');
    }
}
