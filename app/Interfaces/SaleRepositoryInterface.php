<?php

namespace App\Interfaces;

interface SaleRepositoryInterface
{
    public function getSaleByPeriod($startDate, $lastDate): array;
}