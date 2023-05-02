<?php

use App\Http\Controllers\MarketController;
use Illuminate\Support\Facades\Route;

Route::put('markets', [MarketController::class, 'update'])->name('markets.update');
Route::get('markets', [MarketController::class, 'show'])->name('markets.show');