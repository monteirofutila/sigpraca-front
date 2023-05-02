<?php

namespace App\Http\Controllers;

use App\Http\Middleware\EnsureTokenIsValid;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware(EnsureTokenIsValid::class)->only('logout');
    }
    public function show()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        session(['api_token' => true]);
        return redirect()->route('home');
    }

    public function logout(Request $request)
    {
        session()->flush();
        return redirect()->route('login.show');
    }

}