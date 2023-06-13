<?php

namespace App\Services;

use App\Repositories\SaleRepository;

class SaleService
{
    public function __construct(protected SaleRepository $repository)
    {
    }
    public function getSaleByPeriod($startDate, $lastDate): ?object
    {
        $response = $this->repository->getSalebyPeriod($startDate, $lastDate);

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