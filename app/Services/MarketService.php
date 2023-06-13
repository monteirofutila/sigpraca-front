<?php

namespace App\Services;

use App\DTO\Users\MarketDTO;
use App\Repositories\MarketRepository;

class MarketService
{
    public function __construct(protected MarketRepository $repository)
    {
    }
    public function getFirst(): ?object
    {
        $response = $this->repository->getFisrt();

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

    public function update(MarketDTO $dto): ?object
    {
        $response = $this->repository->update($dto->toArray());

        $status = $response['status'];
        $data = $response['data'];

        if ($status === 200 || $status === 422 || $status === 201) {
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