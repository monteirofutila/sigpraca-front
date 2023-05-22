<?php

namespace App\Services;

use App\Repositories\RoleRepository;

class RoleService
{
    public function __construct(protected RoleRepository $repository)
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

}