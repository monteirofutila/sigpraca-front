<?php

namespace App\Interfaces;

interface UserRepositoryInterface
{
    public function findById(string $id): array;

    public function getAll(): array;

    public function new(array $data): array;

    public function update(string $id, array $data): array;

    public function delete(string $id): array;
}