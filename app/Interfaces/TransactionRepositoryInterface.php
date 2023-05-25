<?php

namespace App\Interfaces;

interface TransactionRepositoryInterface
{
    public function getAll(): array;
    public function addCredit(string $workerID): array;
    public function addDebit(string $workerID): array;
}