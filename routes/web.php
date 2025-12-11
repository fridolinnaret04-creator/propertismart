<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WelcomeController;

// ======================
// ROUTE HALAMAN USER
// ======================
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::get('/admin/transaction/pdf', [TransactionController::class, 'exportPdf'])
    ->name('transaction.pdf');

// ======================
// ROUTE ADMIN
// ======================
Route::prefix('admin')->group(function () {

    // CATEGORY
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/tambah', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');

    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');

    Route::get('/category/hapus/{id}', [CategoryController::class, 'delete'])->name('category.delete');
    Route::get('/category/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

    // TRANSACTION
    Route::get('/transaction', [TransactionController::class, 'index'])->name('transaction.index');
    Route::post('/transaction/store', [TransactionController::class, 'store'])->name('transaction.store');
    Route::get('/transaction/delete/{id}', [TransactionController::class, 'destroy'])->name('transaction.delete');

});
