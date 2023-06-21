<?php

namespace App\DTO\Users;

use App\Http\Requests\UpdateUserRequest;

class UpdateUserDTO
{
    public function __construct(
        public string $name,
        public string $user_name,
        public ?string $email,
        public ?string $password,
        public ?string $password_confirmation,
        public $photo,
        public ?string $phone_mobile,
        public ?string $phone_other,
        public ?string $address_country,
        public ?string $address_state,
        public ?string $address_city,
        public ?string $address_street,
        public $date_birth,
        public string $gender,
        public ?string $bi,
        public string $role,
    ) {
    }

    public function toArray(): array
    {
        $properties = get_object_vars($this);
        $keys = array_map(fn($property) => $property, array_keys($properties));
        return array_combine($keys, $properties);
    }

    public static function makeFromRequest(UpdateUserRequest $request): self
    {
        return new self(
            $request->name,
            $request->user_name,
            $request->email,
            $request->password,
            $request->password_confirmation,
            $request->photo,
            $request->phone_mobile,
            $request->phone_other,
            $request->address_country,
            $request->address_state,
            $request->address_city,
            $request->address_street,
            $request->date_birth,
            $request->gender,
            $request->bi,
            $request->role,
        );
    }
}