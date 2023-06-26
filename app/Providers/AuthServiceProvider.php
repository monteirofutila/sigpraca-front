<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Repositories\PermissionRepository;
use App\Services\PermissionService;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class AuthServiceProvider extends ServiceProvider
{
    protected $permissions;
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('update-post', function ($user) {
            return true;
        });

    }
}