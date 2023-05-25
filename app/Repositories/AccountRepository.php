<?php

namespace App\Repositories;

use App\Interfaces\AccountRepositoryInterface;
use Illuminate\Support\Facades\Http;

class AccountRepository implements AccountRepositoryInterface
{
    protected $http;
    public function __construct()
    {
        $this->http = Http::acceptJson();
    }
    public function getAccountByWorker(string $workerID): array
    {
        $response = $this->http->withToken(session('token'))->get(config('app.api.base_url') . "/workers/$workerID/accounts");

        $statusCode = $response->status();
        $responseData = $response->object();

        return [
            'status' => $statusCode,
            'data' => $responseData
        ];
    }

}