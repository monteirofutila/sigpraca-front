<?php

use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('transactions', [TransactionController::class, 'index'])->name('transactions.index');
Route::get('transactions/{id}', [TransactionController::class, 'show'])->name('transactions.show');

Route::get('transactions/credits/add', [TransactionController::class, 'addCredit'])->name('transactions.credit');
Route::get('transactions/debits/add', [TransactionController::class, 'addDebit'])->name('transactions.debit');

Route::get('transactions/credits/confirmation', [TransactionController::class, 'confirmationCredit'])->name('transactions.credit.confirmation');
Route::get('transactions/debits/confirmation', [TransactionController::class, 'confirmationDebit'])->name('transactions.debit.confirmation');

Route::post('workers/transactions/credits', [TransactionController::class, 'storeCredit'])->name('transactions.credit.store');
Route::post('workers/transactions/debits', [TransactionController::class, 'storeDebit'])->name('transactions.debit.store');