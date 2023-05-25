<?php

namespace App\Services;

use App\Repositories\StatistRepository;

class StatistService
{
    public function __construct(protected StatistRepository $repository)
    {
    }
    public function stast(): ?object
    {
        $response = $this->repository->stast();

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

}