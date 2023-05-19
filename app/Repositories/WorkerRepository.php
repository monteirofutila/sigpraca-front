<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class WorkerRepository implements UserRepositoryInterface
{
    protected $http;
    public function __construct()
    {
        $token = "1|oWpPRUI88FMC1QbrOD5my6VR1axVuihjRdWPMUjj"; // Session::get('access_token');
        $this->http = Http::acceptJson()->withToken($token);
    }

    public function findById(string $id): array
    {
        return $this->http->get("/workers/$id");
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
        return $this->http->put("/users/$id", $data);
    }

    public function delete(string $id): array
    {
        return $this->http->delete("/users/$id");
    }
}