<?php

namespace App\Repositories;

use App\Interfaces\PermissionRepositoryInterface;
use Illuminate\Support\Facades\Http;

class PermissionRepository implements PermissionRepositoryInterface
{
    protected $http;

    public function __construct()
    {
        $this->http = Http::acceptJson();
    }
    public function getAllPermissions(): array
    {
        $response = $this->http->withToken(session('token'))->post(config('app.api.base_url') . "/permissions");

        $statusCode = $response->status();
        $responseData = $response->object();

        return [
            'status' => $statusCode,
            'data' => $responseData
        ];
    }

    public function getAllRoles(): array
    {
        $response = $this->http->withToken(session('token'))->post(config('app.api.base_url') . "/roles");

        $statusCode = $response->status();
        $responseData = $response->object();

        return [
            'status' => $statusCode,
            'data' => $responseData
        ];
    }
}