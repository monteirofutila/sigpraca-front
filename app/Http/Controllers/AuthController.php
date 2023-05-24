<?php

namespace App\Http\Controllers;

use App\DTO\Auth\LoginDTO;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function __construct(protected AuthService $service)
    {
        $this->middleware(EnsureTokenIsValid::class)->only('logout');
    }
    public function show()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $dto = LoginDTO::makeFromRequest($request);
        $request->session()->regenerate();
        $response = $this->service->login($dto);

        if (!$response) {
            toast('Nome de usuário ou palavra-passe errado(a)', 'error');
            return redirect()->back();
        }

        if (isset($response->errors)) {
            return redirect()->back()->withErrors($response->errors);
        }

        if (isset($response->token)) {
            session(['token' => $response->token]);
            return redirect()->route('home');
        }
    }

    public function logout(Request $request)
    {
        $response = $this->service->logout();

        if (!$response) {
            toast('Erro ao sair do sistema!', 'error');
            return redirect()->back();
        }

        return redirect()->route('login.show');
    }
}
