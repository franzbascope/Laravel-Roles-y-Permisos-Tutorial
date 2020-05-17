<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['roles.fields'], function ($view) {
            $permissionItems = Permission::pluck('name', 'id')->toArray();
            $view->with('permissionItems', $permissionItems);
        });
        View::composer(['users.fields'], function ($view) {
            $roleItems = Role::pluck('name', 'name')->toArray();
            $view->with('roleItems', $roleItems);
        });
        //
    }
}
