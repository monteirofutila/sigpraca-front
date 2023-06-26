<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;

Route::get('workers/{workerID}/accounts', [AccountController::class, 'show'])->name('accounts.show');
Route::get('accounts/search', [AccountController::class, 'index'])->name('accounts.index');
Route::post('accounts/search', [AccountController::class, 'search'])->name('accounts.search');