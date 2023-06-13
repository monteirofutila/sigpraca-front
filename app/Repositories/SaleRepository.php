<?php

namespace App\Repositories;

use App\Interfaces\SaleRepositoryInterface;
use Illuminate\Support\Facades\Http;

class SaleRepository implements SaleRepositoryInterface
{
    protected $http;
    public function __construct()
    {
        $this->http = Http::acceptJson();
    }
    public function getSalebyPeriod($startDate, $lastDate): array
    {
        $response = $this->http->withToken(session('token'))->get(config('app.api.base_url') . "/sales/$startDate/$lastDate");

        $statusCode = $response->status();
        $responseData = $response->object();

        return [
            'status' => $statusCode,
            'data' => $responseData
        ];
    }

}