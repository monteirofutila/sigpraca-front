<?php

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
    return view('home.dashboard');
});

Route::get('/users', function () {
    return view('administracao.users.list_users');
});

Route::get('/workers/new', function () {
    return view('administracao.workers.add_workers');
});

Route::get('/login', function () {
    return view('auth.login');
});
