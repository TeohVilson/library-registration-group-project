<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Redirect root to login page
Route::get('/', function () {
    return redirect()->route('login');
});

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// User Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/search', [BookController::class, 'search'])->name('books.search');
    Route::post('/rent/{id}', [LoanController::class, 'rentBook'])->name('books.rent');
    Route::get('/my-loans', [LoanController::class, 'index'])->name('loans.index');
    Route::put('/my-loans/{id}', [LoanController::class, 'update'])->name('loans.update');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('profile.edit');
    Route::put('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');
});

// Admin Routes
Route::prefix('admin')->middleware(['auth', 'admin', 'admin.timeout'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('books', BookController::class)->names([
        'index' => 'admin.books.index',
        'create' => 'admin.books.create',
        'store' => 'admin.books.store',
        'edit' => 'admin.books.edit',
        'update' => 'admin.books.update',
        'destroy' => 'admin.books.destroy',
    ])->except(['show']);
    Route::resource('users', UserController::class)->names([
        'index' => 'admin.users.index',
        'create' => 'admin.users.create',
        'store' => 'admin.users.store',
        'destroy' => 'admin.users.destroy',
    ])->only(['index', 'create', 'store', 'destroy']);
    Route::get('/loans', [LoanController::class, 'showLoans'])->name('admin.loans.index');
    Route::put('/loans/{id}', [LoanController::class, 'updateLoanStatus'])->name('admin.loans.update');
    Route::put('/loans/{id}/pickup', [LoanController::class, 'markAsPickedUp'])->name('admin.loans.pickup');
    Route::put('/loans/{id}/return', [LoanController::class, 'markAsReturned'])->name('admin.loans.return');
});
