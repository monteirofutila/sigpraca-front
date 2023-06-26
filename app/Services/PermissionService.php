<?php

namespace App\Services;

use App\Repositories\PermissionRepository;

class PermissionService
{

    public function __construct(protected PermissionRepository $repository)
    {
    }
    public function getAllPermissions(): ?object
    {
        $response = $this->repository->getAllPermissions();

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

    public function getAllRoles(): ?object
    {
        $response = $this->repository->getAllRoles();

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