<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Category;
use App\Policies\CategoryPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Category::class => CategoryPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // Gate only:
        // Gate::define('list_category', function ($user) {
        //     return $user->checkPermissionAccess(config('permissions.access.list-category'));
        // });

        // Gate and Policy:
        Gate::define('list-category', [CategoryPolicy::class, 'view']);
        Gate::define('add-category', [CategoryPolicy::class, 'create']);
        Gate::define('edit-category', [CategoryPolicy::class, 'update']);
        Gate::define('delete-category', [CategoryPolicy::class, 'delete']);
    }
}
