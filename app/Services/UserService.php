<?php

namespace App\Services;

use App\DTO\Users\CreateUserDTO;
use App\Repositories\UserRepository;


class UserService
{
    public function __construct(protected UserRepository $repository)
    {
    }

    public function getAll(): ?object
    {
        $response = $this->repository->getAll();

        $status = $response['status'];
        $data = $response['data'];

        if ($status === 200) {
            return $data;
        } else if ($status === 401) {
            abort(401);
        } else if ($status === 500) {
            abort(500);
        } else {
            return null;
        }

    }
    public function new(CreateUserDTO $dto): ?object
    {
        $response = $this->repository->new($dto->toArray());

        $status = $response['status'];
        $data = $response['data'];

        if ($status === 200 || $status === 422 || $status === 201) {
            return $data;
        } else if ($status === 401) {
            abort(401);
        } else if ($status === 500) {
            abort(500);
        } else {
            return null;
        }

    }

    public function delete(string $id): ?object
    {
        $response = $this->repository->delete($id);

        $status = $response['status'];
        $data = $response['data'];

        if ($status === 200 || $status === 201) {
            return $data;
        } elseif ($status === 500) {
            abort(500);
        } elseif ($status === 404) {
            abort(404);
        } else {
            return null;
        }

    }
}