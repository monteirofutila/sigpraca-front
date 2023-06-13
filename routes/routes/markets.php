<?php

use App\Http\Controllers\MarketController;
use Illuminate\Support\Facades\Route;

Route::post('markets', [MarketController::class, 'update'])->name('markets.update');
Route::get('markets', [MarketController::class, 'edit'])->name('markets.edit');