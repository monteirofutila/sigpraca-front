<?php

namespace App\Services;

use App\DTO\Auth\LoginDTO;
use App\Repositories\AuthRepository;

class AuthService
{
    public function __construct(protected AuthRepository $repository)
    {
    }
    public function login(LoginDTO $dto): ?object
    {

        $response = $this->repository->login($dto->toArray());

        $status = $response['status'];
        $data = $response['data'];

        if ($status === 200) {
            session(['access_token' => $data->token]);
            return $data;

        } else {
            return null;
        }

    }
    public function logout(): bool
    {
        $response = $this->repository->logout();

        $status = $response['status'];

        if ($status === 200) {
            return true;
        } else if ($status === 401) {
            abort(401);
        } else if ($status === 500) {
            abort(500);
        } else {
            return false;
        }

    }

}