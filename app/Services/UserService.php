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
        } else {
            return null;
        }

    }

    public function new(CreateUserDTO $dto): ?object
    {
        return $this->repository->new($dto->toArray());
    }
}