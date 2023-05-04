<?php
use App\DTO\Users\CreateUserDTO;


class UserServices
{
    public function __construct()
    {

    }

    public function new()
    {

    }

    public function new(CreateUserDTO $dto): ?object
    {
        return $this->repository->new($dto->toArray());
    }
}