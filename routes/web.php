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

require base_path('routes/routes/auth.php');
require base_path('routes/routes/dashboard.php');
require base_path('routes/routes/users.php');
require base_path('routes/routes/workers.php');
require base_path('routes/routes/transactions.php');
require base_path('routes/routes/market.php');