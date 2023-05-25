<?php

namespace App\Interfaces;

interface TransactionRepositoryInterface
{
    public function getAll(): array;
    public function addCredit(string $workerID, string $password): array;
    public function addDebit(string $workerID, string $password): array;
}