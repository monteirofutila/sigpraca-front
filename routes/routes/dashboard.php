<?php


use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'home'])->name('home');

Route::get('/dashboard', function () {
    return redirect('/');
});

Route::get('/home', function () {
    return redirect('/');
});