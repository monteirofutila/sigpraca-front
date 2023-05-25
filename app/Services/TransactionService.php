<?php

namespace App\Services;

use App\DTO\Transactions\CreditDebitDTO;
use App\Repositories\TransactionRepository;

class TransactionService
{
    public function __construct(protected TransactionRepository $repository)
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

    public function addCredit(CreditDebitDTO $dto): object|null|bool
    {
        $response = $this->repository->addCredit($dto->worker_id, $dto->password);

        $status = $response['status'];
        $data = $response['data'];

        if ($status === 200 || $status === 422 || $status === 201) {
            return $data;
        } else if ($status === 400) {
            return false;
        } else if ($status === 401) {
            abort(401);
        } else if ($status === 500) {
            abort(500);
        } else {
            return null;
        }
    }

    public function addDebit(CreditDebitDTO $dto): object|null|bool
    {
        $response = $this->repository->addDebit($dto->worker_id, $dto->password);

        $status = $response['status'];
        $data = $response['data'];

        if ($status === 200 || $status === 422 || $status === 201) {
            return $data;
        } else if ($status === 400) {
            return false;
        } else if ($status === 401) {
            abort(401);
        } else if ($status === 500) {
            abort(500);
        } else {
            return null;
        }
    }
}
