<?php

namespace App\Interfaces;

interface AccountRepositoryInterface
{
    public function getAccountByWorker(string $workerID): array;
}