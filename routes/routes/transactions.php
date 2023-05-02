<?php

use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('transactions', [TransactionController::class, 'index'])->name('transactions.index');
Route::get('transactions/{id}', [TransactionController::class, 'show'])->name('transactions.show');
Route::post('transactions/credit', [TransactionController::class, 'credit'])->name('transactions.credit');
Route::post('transactions/debit', [TransactionController::class, 'debit'])->name('transactions.debit');