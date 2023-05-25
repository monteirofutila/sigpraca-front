<?php

namespace App\DTO\Transactions;

use App\Http\Requests\CreditDebitRequest;

class CreditDebitDTO
{
    public function __construct(
        public string $worker_id,
        public string $password,
    ) {
    }

    public function toArray(): array
    {
        $properties = get_object_vars($this);
        $keys = array_map(fn ($property) => $property, array_keys($properties));
        return array_combine($keys, $properties);
    }

    public static function makeFromRequest(CreditDebitRequest $request): self
    {
        return new self(
            $request->worker_id,
            $request->password,
        );
    }
}
