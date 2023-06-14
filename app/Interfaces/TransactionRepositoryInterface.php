<?php

namespace App\Interfaces;

interface TransactionRepositoryInterface
{
    public function getAll(): array;
    public function addCredit(array $data): array;
    public function addDebit(array $data): array;
}