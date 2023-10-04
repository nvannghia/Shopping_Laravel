<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use App\Policies\CategoryPolicy;
use App\Policies\MenuPolicy;
use App\Policies\PermissionPolicy;
use App\Policies\ProductPolicy;
use App\Policies\RolePolicy;
use App\Policies\SettingPolicy;
use App\Policies\SliderPolicy;
use App\Policies\UserPolicy;
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
        // Category::class => CategoryPolicy::class,
        // Product::class => ProductPolicy::class,
        // Slider::class => SliderPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // Gate only:
        // Gate::define('list_category', function ($user) {
        //     return $user->checkPermissionAccess(config('permissions.access.list-product'));
        // });

        // Combine Gate and Policy:
        // Category
        Gate::define('list-category', [CategoryPolicy::class, 'view']);
        Gate::define('add-category', [CategoryPolicy::class, 'create']);
        Gate::define('edit-category', [CategoryPolicy::class, 'update']);
        Gate::define('delete-category', [CategoryPolicy::class, 'delete']);
        // Product
        Gate::define('list-product', [ProductPolicy::class, 'view']);
        Gate::define('add-product', [ProductPolicy::class, 'create']);
        Gate::define('edit-product', [ProductPolicy::class, 'update']);
        Gate::define('delete-product', [ProductPolicy::class, 'delete']);
        // Slider
        Gate::define('list-slider', [SliderPolicy::class, 'view']);
        Gate::define('add-slider', [SliderPolicy::class, 'create']);
        Gate::define('edit-slider', [SliderPolicy::class, 'update']);
        Gate::define('delete-slider', [SliderPolicy::class, 'delete']);
        // Setting 
        Gate::define('list-setting', [SettingPolicy::class, 'view']);
        Gate::define('add-setting', [SettingPolicy::class, 'create']);
        Gate::define('edit-setting', [SettingPolicy::class, 'update']);
        Gate::define('delete-setting', [SettingPolicy::class, 'delete']);
        // Menu
        Gate::define('list-menu', [MenuPolicy::class, 'view']);
        Gate::define('add-menu', [MenuPolicy::class, 'create']);
        Gate::define('edit-menu', [MenuPolicy::class, 'update']);
        Gate::define('delete-menu', [MenuPolicy::class, 'delete']);
        // User
        Gate::define('list-user', [UserPolicy::class, 'view']);
        Gate::define('add-user', [UserPolicy::class, 'create']);
        Gate::define('edit-user', [UserPolicy::class, 'update']);
        Gate::define('delete-user', [UserPolicy::class, 'delete']);
        // Role
        Gate::define('list-role', [RolePolicy::class, 'view']);
        Gate::define('add-role', [RolePolicy::class, 'create']);
        Gate::define('edit-role', [RolePolicy::class, 'update']);
        Gate::define('delete-role', [RolePolicy::class, 'delete']);
        //Permission 
        Gate::define('add-permission', [PermissionPolicy::class, 'create']);
    }
}
