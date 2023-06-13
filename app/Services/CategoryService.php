<?php

namespace App\Services;

use App\DTO\Categories\CategoryDTO;
use App\Repositories\CategoryRepository;


class CategoryService
{
    public function __construct(protected CategoryRepository $repository)
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
    public function new(CategoryDTO $dto): ?object
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
}