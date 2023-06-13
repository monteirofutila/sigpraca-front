<?php

namespace App\Repositories;

use App\Interfaces\CategoryRepositoryInterface;
use Illuminate\Support\Facades\Http;

class CategoryRepository implements CategoryRepositoryInterface
{
    protected $http;
    public function __construct()
    {
        $this->http = Http::acceptJson();
    }

    public function findById(string $id): array
    {
        $response = $this->http->withToken(session('token'))->get(config('app.api.base_url') . "/categories/$id");

        $statusCode = $response->status();
        $responseData = $response->object();

        return [
            'status' => $statusCode,
            'data' => $responseData
        ];
    }

    public function getAll(): array
    {
        $response = $this->http->withToken(session('token'))->get(config('app.api.base_url') . "/categories");

        $statusCode = $response->status();
        $responseData = $response->object();

        return [
            'status' => $statusCode,
            'data' => $responseData
        ];
    }

    public function new(array $data): array
    {

        $response = $this->http->withToken(session('token'))->post(config('app.api.base_url') . "/categories", $data);

        $statusCode = $response->status();
        $responseData = $response->object();

        return [
            'status' => $statusCode,
            'data' => $responseData
        ];
    }

    public function update(string $id, array $data): array
    {
        $response = $this->http->withToken(session('token'))->put(config('app.api.base_url') . "/categories/$id", $data);

        $statusCode = $response->status();
        $responseData = $response->object();

        return [
            'status' => $statusCode,
            'data' => $responseData
        ];
    }

    public function delete(string $id): array
    {
        $response = $this->http->withToken(session('token'))->delete(config('app.api.base_url') . "/categories/$id");

        $statusCode = $response->status();
        $responseData = $response->object();

        return [
            'status' => $statusCode,
            'data' => $responseData
        ];
    }
}