<?php

namespace App\Repositories;

use App\Interfaces\AuthRepositoryInterface;
use Illuminate\Support\Facades\Http;

class AuthRepository implements AuthRepositoryInterface
{
    protected $http;

    public function __construct()
    {
        $this->http = Http::acceptJson();
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
    public function me(): array
    {
        $response = $this->http->withToken(session('token'))->post(config('app.api.base_url') . "/auth/me");

        $statusCode = $response->status();
        $responseData = $response->object();

        return [
            'status' => $statusCode,
            'data' => $responseData
        ];
    }
    public function logout(): array
    {
        $response = $this->http->withToken(session('token'))->post(config('app.api.base_url') . "/auth/logout");
        $statusCode = $response->status();

        return [
            'status' => $statusCode
        ];
    }
}
