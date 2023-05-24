<?php

namespace App\Repositories;

use App\Interfaces\RoleRepositoryInterface;
use Illuminate\Support\Facades\Http;

class RoleRepository implements RoleRepositoryInterface
{
    protected $http;
    public function __construct()
    {
        $this->http = Http::acceptJson();
    }
    public function getAll(): array
    {
        $response = $this->http->withToken(session('token'))->get(config('app.api.base_url') . "/roles");

        $statusCode = $response->status();
        $responseData = $response->object();

        return [
            'status' => $statusCode,
            'data' => $responseData
        ];
    }
}
