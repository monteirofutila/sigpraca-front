<?php

namespace App\Interfaces;

interface AuthRepositoryInterface
{
    public function login(array $data): array;
    public function me(): array;
    public function logout(): array;
}
