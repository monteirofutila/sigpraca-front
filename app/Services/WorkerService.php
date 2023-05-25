<?php

namespace App\Services;

use App\DTO\Workers\CreateWorkerDTO;
use App\Repositories\WorkerRepository;


class WorkerService
{
    public function __construct(protected WorkerRepository $repository)
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

    public function new(CreateWorkerDTO $dto): ?object
    {
        $response = $this->repository->new($dto->toArray());

        $status = $response['status'];
        $data = $response['data'];

        if ($status === 200 || $status === 422 || $status === 201) {
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