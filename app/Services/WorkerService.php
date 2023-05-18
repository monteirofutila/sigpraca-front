<?php

namespace App\Services;

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
        } else {
            return null;
        }

    }


}