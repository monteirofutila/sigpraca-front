<?php

namespace App\Interfaces;

interface MarketRepositoryInterface
{
    public function getFisrt(): array;

    public function update(array $data): array;

}