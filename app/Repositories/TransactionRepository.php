<?php

namespace App\Repositories;

use App\Interfaces\TransactionRepositoryInterface;
use Illuminate\Support\Facades\Http;

class TransactionRepository implements TransactionRepositoryInterface
{
    protected $http;
    public function __construct()
    {
        $this->http = Http::acceptJson();
    }
    public function getAll(): array
    {
        $response = $this->http->withToken(session('token'))->get(config('app.api.base_url') . "/transactions");

        $statusCode = $response->status();
        $responseData = $response->object();

        return [
            'status' => $statusCode,
            'data' => $responseData
        ];
    }
}
