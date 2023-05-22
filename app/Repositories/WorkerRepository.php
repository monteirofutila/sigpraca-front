<?php

namespace App\Repositories;

use App\Interfaces\WorkerRepositoryInterface;
use Illuminate\Support\Facades\Http;

class WorkerRepository implements WorkerRepositoryInterface
{
    protected $http;
    public function __construct()
    {
        $token = session('access_token');
        $this->http = Http::acceptJson()->withToken($token);
    }

    public function findById(string $id): array
    {
        $response = $this->http->get(config('app.api.base_url') . "/workers/$id");

        $statusCode = $response->status();
        $responseData = $response->object();

        return [
            'status' => $statusCode,
            'data' => $responseData
        ];
    }

    public function getAll(): array
    {
        $response = $this->http->get(config('app.api.base_url') . "/workers");

        $statusCode = $response->status();
        $responseData = $response->object();

        return [
            'status' => $statusCode,
            'data' => $responseData
        ];
    }

    public function new(array $data): array
    {

        if (isset($data['photo'])) {
            $this->http->attach(
                'photo',
                file_get_contents($data['photo']),
                $data['photo']->getClientOriginalName()
            );
        }

        $response = $this->http->post(config('app.api.base_url') . "/workers", $data);

        $statusCode = $response->status();
        $responseData = $response->object();

        return [
            'status' => $statusCode,
            'data' => $responseData
        ];

    }

    public function update(string $id, array $data): array
    {
        $response = $this->http->put(config('app.api.base_url') . "/users/$id", $data);

        $statusCode = $response->status();
        $responseData = $response->object();

        return [
            'status' => $statusCode,
            'data' => $responseData
        ];
    }

    public function delete(string $id): array
    {
        $response = $this->http->delete(config('app.api.base_url') . "/users/$id");

        $statusCode = $response->status();
        $responseData = $response->object();

        return [
            'status' => $statusCode,
            'data' => $responseData
        ];
    }
}