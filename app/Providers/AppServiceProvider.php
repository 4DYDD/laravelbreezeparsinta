<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Store;
use App\Policies\StorePolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(Store::class, StorePolicy::class);
        Gate::define('isPartner', fn(User $user) => $user->isAdmin() || $user->isPartner());

        Model::preventLazyLoading(!app()->isProduction());
    }
}
