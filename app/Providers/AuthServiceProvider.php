<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('add_income', function ($user) { return $user->user_type === 1; });
        Gate::define('edit_income', function ($user) { return $user->user_type === 1; });
        Gate::define('delete_income', function ($user) { return $user->user_type === 1; });
        Gate::define('create_users', function ($user) { return $user->user_type === 1; });
        Gate::define('add_items', function ($user) { return $user->user_type === 1; });
        Gate::define('add_purchased_items', function ($user) { return $user->user_type === 1; });
        Gate::define('view_purchase_option', function ($user) { return $user->user_type === 1; });
        Gate::define('edit_purchase', function ($user) { return $user->user_type === 1; });
        Gate::define('delete_purchase', function ($user) { return $user->user_type === 1; });
        Gate::define('add_expenses', function ($user) { return $user->user_type === 1; });
        Gate::define('edit_expenses', function ($user) { return $user->user_type === 1; });
        Gate::define('add_expenses', function ($user) { return $user->user_type === 1; });
        Gate::define('delete_expenses', function ($user) { return $user->user_type === 1; });
        Gate::define('add_sold_items', function ($user) { return $user->user_type === 1; });
        Gate::define('add_revenue', function ($user) { return $user->user_type === 1; });
    }
}
