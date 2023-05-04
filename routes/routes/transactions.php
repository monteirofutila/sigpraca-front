<?php

use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('transactions', [TransactionController::class, 'index'])->name('transactions.index');
Route::get('transactions/{id}', [TransactionController::class, 'show'])->name('transactions.show');
Route::get('transactions/credits/add', [TransactionController::class, 'addCredit'])->name('transactions.credit');
Route::get('transactions/debits/add', [TransactionController::class, 'addDebit'])->name('transactions.debit');