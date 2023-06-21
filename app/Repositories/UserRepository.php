<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Http;

class UserRepository implements UserRepositoryInterface
{
    protected $http;
    public function __construct()
    {
        $this->http = Http::acceptJson();
    }

    public function findById(string $id): array
    {
        $response = $this->http->withToken(session('token'))->get(config('app.api.base_url') . "/users/$id");

        $statusCode = $response->status();
        $responseData = $response->object();

        return [
            'status' => $statusCode,
            'data' => $responseData
        ];
    }

    public function getAll(): array
    {
        $response = $this->http->withToken(session('token'))->get(config('app.api.base_url') . "/users");

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

        $response = $this->http->withToken(session('token'))->post(config('app.api.base_url') . "/users", $data);

        $statusCode = $response->status();
        $responseData = $response->object();

        return [
            'status' => $statusCode,
            'data' => $responseData
        ];
    }

    public function update(string $id, array $data): array
    {
        if (isset($data['photo'])) {
            $this->http->attach(
                'photo',
                file_get_contents($data['photo']),
                $data['photo']->getClientOriginalName()
            );
        } else {
            unset($data['photo']);
        }

        $response = $this->http->withToken(session('token'))->post(config('app.api.base_url') . "/users/$id", $data);

        $statusCode = $response->status();
        $responseData = $response->object();

        return [
            'status' => $statusCode,
            'data' => $responseData
        ];
    }

    public function delete(string $id): array
    {
        $response = $this->http->withToken(session('token'))->delete(config('app.api.base_url') . "/users/$id");

        $statusCode = $response->status();
        $responseData = $response->object();

        return [
            'status' => $statusCode,
            'data' => $responseData
        ];
    }
}