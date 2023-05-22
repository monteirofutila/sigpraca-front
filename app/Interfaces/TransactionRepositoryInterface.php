<?php

namespace App\Interfaces;

interface TransactionRepositoryInterface
{
    public function getAll(): array;
}