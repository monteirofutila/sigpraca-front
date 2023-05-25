<?php

namespace App\Repositories;

use App\Interfaces\StatistRepositoryInterface;
use Illuminate\Support\Facades\Http;

class StatistRepository implements StatistRepositoryInterface
{
    protected $http;
    public function __construct()
    {
        $this->http = Http::acceptJson();
    }
    public function stast(): array
    {
        $response = $this->http->withToken(session('token'))->get(config('app.api.base_url') . "/statist");

        $statusCode = $response->status();
        $responseData = $response->object();

        return [
            'status' => $statusCode,
            'data' => $responseData
        ];
    }
}