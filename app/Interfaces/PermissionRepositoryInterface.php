<?php

namespace App\Interfaces;

interface PermissionRepositoryInterface
{
    public function getAllPermissions(): array;
    public function getAllRoles(): array;
}