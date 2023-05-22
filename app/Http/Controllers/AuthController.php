<?php

namespace App\Http\Controllers;

use App\DTO\Auth\LoginDTO;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;

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
        $response = $this->service->login($dto);

        if (isset($response->errors)) {
            toast('Nome de usuário ou palavra-passe errado(a)', 'error');
            return redirect()->back()->withErrors($response->errors);
        }

        return redirect()->route('home');
    }

    public function logout(Request $request)
    {
        $response = $this->service->logout();

        if (!$response) {
            toast('Erro ao sair do sistema!', 'error');
            return redirect()->back();
        }

        session()->flush();

        return redirect()->route('login.show');
    }

}