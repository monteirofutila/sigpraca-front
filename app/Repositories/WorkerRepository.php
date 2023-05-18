<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class WorkerRepository implements UserRepositoryInterface
{
    protected $http;
    public function __construct()
    {
        $token = "1|oWpPRUI88FMC1QbrOD5my6VR1axVuihjRdWPMUjj"; // Session::get('access_token');
        $this->http = Http::baseUrl(config('app.api.base_url'))->acceptJson()->withToken($token);
    }

    public function findById(string $id): Response
    {
        return $this->http->get("/workers/$id");
    }

    public function getAll(): array
    {
        $response = $this->http->get("/public/api/workers");

        $statusCode = $response->status();
        $responseData = $response->object();

        return [
            'status' => $statusCode,
            'data' => $responseData
        ];
    }

    public function new(array $data): Response
    {
        return $this->http->post("/users", $data);
    }

    public function update(string $id, array $data): Response
    {
        return $this->http->put("/users/$id", $data);
    }

    public function delete(string $id): Response
    {
        return $this->http->delete("/users/$id");
    }
}