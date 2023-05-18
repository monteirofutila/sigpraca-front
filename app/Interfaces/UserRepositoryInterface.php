<?php

namespace App\Interfaces;

use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
    public function findById(string $id);

    public function getAll(): array;

    public function new(array $data);

    public function update(string $id, array $data);

    public function delete(string $id);
}