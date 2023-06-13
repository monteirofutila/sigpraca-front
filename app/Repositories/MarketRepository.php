<?php

namespace App\Repositories;

use App\Interfaces\MarketRepositoryInterface;
use Illuminate\Support\Facades\Http;

class MarketRepository implements MarketRepositoryInterface
{
    protected $http;
    public function __construct()
    {
        $this->http = Http::acceptJson();
    }
    public function getFisrt(): array
    {
        $response = $this->http->withToken(session('token'))->get(config('app.api.base_url') . "/market");

        $statusCode = $response->status();
        $responseData = $response->object();

        return [
            'status' => $statusCode,
            'data' => $responseData
        ];
    }

    public function update(array $data): array
    {
        $response = $this->http->withToken(session('token'))->put(config('app.api.base_url') . "/market", $data);

        $statusCode = $response->status();
        $responseData = $response->object();

        return [
            'status' => $statusCode,
            'data' => $responseData
        ];
    }
}