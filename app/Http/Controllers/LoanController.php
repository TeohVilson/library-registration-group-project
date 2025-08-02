<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Book;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    // Show user's loans
    public function index()
    {
        $this->authorize('viewAny', Loan::class);
        $loans = Loan::with('book')
            ->where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();
        return view('userLoans', compact('loans'));
    }

    // Update loan status
    public function update(Request $request, $id)
    {
        $loan = Loan::where('user_id', auth()->id())
            ->findOrFail($id);

        $loan->update([
            'status' => 'returned',
            'return_date' => now()
        ]);

        // Increase book stock
        $loan->book->increment('stock');

        return redirect()->route('loans.index')
            ->with('success', 'Book returned successfully!');
    }

    // Show all loans (admin view)
    public function showLoans()
    {
        $this->authorize('viewAny', Loan::class);
        $loans = Loan::with(['user', 'book'])
            ->orderBy('created_at', 'desc')
            ->get();
            
        if ($loans->isEmpty()) {
            session()->flash('info', 'No loans found in the system.');
        }
        
        return view('admin.loans.index', compact('loans'));
    }

    // Update loan status (admin action)
    public function updateLoanStatus(Request $request, $id)
    {
        $loan = Loan::findOrFail($id);
        $this->authorize('update', $loan);

        $request->validate([
            'status' => 'required|string|in:borrowed,returned,overdue'
        ]);

        $loan->update([
            'status' => $request->status,
            'return_date' => $request->status === 'returned' ? now() : null
        ]);

        // If book is returned, increase stock back
        if ($request->status === 'returned' && $loan->book) {
            $loan->book->increment('stock');
        }

        return redirect()->route('admin.loans.index')
            ->with('success', 'Loan status updated successfully.');
    }

    // User action: Rent a book
    public function rentBook($id)
    {
        $book = Book::findOrFail($id);
        $this->authorize('rent', $book);

        // Check if book is in stock
        if ($book->stock < 1) {
            return redirect()->back()->with('error', 'Book is out of stock.');
        }

        // Calculate due date (2 weeks from now)
        $dueDate = now()->addDays(14);

        // Create a new loan record
        Loan::create([
            'user_id' => auth()->id(),
            'book_id' => $book->id,
            'status' => 'waiting_pickup',
            'loan_date' => now(),
            'due_date' => $dueDate,
        ]);

        // Decrease the stock
        $book->decrement('stock');

        return redirect()->back()->with('success', 'Book has been reserved for pickup! Please collect it from the library. After pickup, you will have until ' . $dueDate->format('M d, Y') . ' to return it. You can view your loan details in My Loans.');
    }

    public function markAsPickedUp($id)
    {
        $loan = Loan::findOrFail($id);
        $this->authorize('markAsPickedUp', $loan);

        $loan->update([
            'status' => 'borrowed'
        ]);

        return redirect()->route('admin.loans.index')
            ->with('success', 'Loan marked as picked up successfully.');
    }

    public function markAsReturned($id)
    {
        $loan = Loan::findOrFail($id);
        $this->authorize('markAsReturned', $loan);

        $loan->update([
            'status' => 'returned',
            'return_date' => now()
        ]);

        // Increase book stock
        $loan->book->increment('stock');

        return redirect()->route('admin.loans.index')
            ->with('success', 'Loan marked as returned successfully.');
    }
}

