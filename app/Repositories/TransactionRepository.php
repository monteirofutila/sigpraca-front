<?php

namespace App\Repositories;

use App\Interfaces\TransactionRepositoryInterface;
use Illuminate\Support\Facades\Http;

class TransactionRepository implements TransactionRepositoryInterface
{
    protected $http;
    public function __construct()
    {
        $token = session('access_token');
        $this->http = Http::acceptJson()->withToken($token);
    }
    public function getAll(): array
    {
        $response = $this->http->get(config('app.api.base_url') . "/transactions");

        $statusCode = $response->status();
        $responseData = $response->object();

        return [
            'status' => $statusCode,
            'data' => $responseData
        ];
    }

}