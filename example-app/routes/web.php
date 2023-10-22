<?php

use App\Http\Controllers\BooksController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/books', [BooksController::class, 'list'])->name('books.list');
    Route::get('/books/create', [BooksController::class, 'create'])->name('books.create');
    Route::post('/books/store', [BooksController::class, 'store'])->name('books.store');
    Route::post('/books/search', [BooksController::class, 'search'])->name('books.search');
    Route::get('/books/edit', [BooksController::class, 'edit'])->name('books.edit');
    Route::patch('/books/update', [BooksController::class, 'update'])->name('books.update');
});

require __DIR__.'/auth.php';
