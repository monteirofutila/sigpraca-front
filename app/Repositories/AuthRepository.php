<?php

namespace App\Repositories;

use App\Interfaces\AuthRepositoryInterface;
use Illuminate\Support\Facades\Http;

class AuthRepository implements AuthRepositoryInterface
{
    protected $http;
    public function __construct()
    {
        $token = session('access_token');
        $this->http = Http::acceptJson()->withToken($token);
    }
    public function login(array $data): array
    {
        $response = $this->http->post(config('app.api.base_url') . "/auth/login", $data);

        $statusCode = $response->status();
        $responseData = $response->object();

        return [
            'status' => $statusCode,
            'data' => $responseData
        ];
    }
    public function logout(): array
    {
        $response = $this->http->post(config('app.api.base_url') . "/auth/logout");

        $statusCode = $response->status();

        return [
            'status' => $statusCode
        ];
    }

    public function getAll(){

    }

}