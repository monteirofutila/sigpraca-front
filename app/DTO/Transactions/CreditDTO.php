<?php

namespace App\DTO\Transactions;

use App\Http\Requests\CreditRequest;

class CreditDTO
{
    public function __construct(
        public string $worker_id,
        public string $amount,
        public string $password,
    ) {
    }

    public function toArray(): array
    {
        $properties = get_object_vars($this);
        $keys = array_map(fn($property) => $property, array_keys($properties));
        return array_combine($keys, $properties);
    }

    public static function makeFromRequest(CreditRequest $request): self
    {
        return new self(
            $request->worker_id,
            $request->amount,
            $request->password,
        );
    }
}