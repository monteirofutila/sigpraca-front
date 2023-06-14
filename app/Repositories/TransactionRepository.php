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

    public function getTransactionsByPeriod($startDate, $lastDate): array
    {
        $response = $this->http->withToken(session('token'))->get(config('app.api.base_url') . "/transactions/$startDate/$lastDate");

        $statusCode = $response->status();
        $responseData = $response->object();

        return [
            'status' => $statusCode,
            'data' => $responseData
        ];
    }

    public function addCredit(array $data): array
    {
        $workerID = $data['worker_id'];
        $response = $this->http->withToken(session('token'))
            ->post(config('app.api.base_url') . "/workers/$workerID/transactions/credit", [
                'amount' => $data['amount'],
                'password' => $data['password']
            ]);

        $statusCode = $response->status();
        $responseData = $response->object();

        return [
            'status' => $statusCode,
            'data' => $responseData
        ];
    }

    public function addDebit(array $data): array
    {
        $workerID = $data['worker_id'];
        $response = $this->http->withToken(session('token'))
            ->post(config('app.api.base_url') . "/workers/$workerID/transactions/debit", [
                'password' => $data['password']
            ]);

        $statusCode = $response->status();
        $responseData = $response->object();

        return [
            'status' => $statusCode,
            'data' => $responseData
        ];
    }
}