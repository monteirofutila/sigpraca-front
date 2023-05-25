<?php

namespace App\Services;

use App\Repositories\AccountRepository;

class AccountService
{
    public function __construct(protected AccountRepository $repository)
    {
    }
    public function getAccountByWorker(string $workerID): ?object
    {
        $response = $this->repository->getAccountByWorker($workerID);

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