<?php

use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/transactions/{transactionID}/print', [ReportController::class, 'transactionPrint'])->name('reports.transaction');
