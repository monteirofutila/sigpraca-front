<?php

namespace App\Services;

use App\DTO\Transactions\CreditDTO;
use App\DTO\Transactions\DebitDTO;
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

    public function findByID(string $transactionID): ?object
    {
        $response = $this->repository->findByID($transactionID);

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

    public function getTransactionsByPeriod($startDate, $lastDate): ?object
    {
        $response = $this->repository->getTransactionsByPeriod($startDate, $lastDate);

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

    public function addCredit(CreditDTO $dto): object|null|bool
    {
        $response = $this->repository->addCredit($dto->toArray());

        $status = $response['status'];
        $data = $response['data'];

        if ($status === 200 || $status === 422 || $status === 201 || $status === 403) {
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

    public function addDebit(DebitDTO $dto): object|null|bool
    {
        $response = $this->repository->addDebit($dto->toArray());

        $status = $response['status'];
        $data = $response['data'];

        if ($status === 200 || $status === 422 || $status === 201 || $status === 403) {
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
