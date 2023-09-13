<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
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
        // if($this->app->environment("production")){
        // URL::forceScheme('https');}


        // Should return TRUE or FALSE
        Gate::define('manage_users', function (User $user) {
            return in_array($user->user_type, [1, 3]); // You can add more user types if needed
        });

        //This allows user to delete any information
        Gate::define('delete_user', function(User $user) {
            return in_array($user->user_type, [1, 3]);
        });
        //This allows user to view purchase option
        Gate::define('view_purchase_option', function(User $user) {
            return in_array($user->user_type, [1, 3]);
        });
         //This allows user to edit any information
            Gate::define('add_purchase', function(User $user) {
            return in_array($user->user_type, [1, 3]);
        });
         //This allows user to edit purchase information
        Gate::define('edit_purchase', function(User $user) {
            return in_array($user->user_type, [1, 3]);
        });
         //This allows user to delete purchase information
        Gate::define('delete_purchase', function(User $user) {
            return in_array($user->user_type, [1, 3]);
        });

         //This allows user to add income
            Gate::define('add_income', function(User $user) {
            return in_array($user->user_type, [1, 3]);
        });
         //This allows user to edit income information
        Gate::define('edit_income', function(User $user) {
            return in_array($user->user_type, [1, 3]);
        });
         //This allows user to delete income information
        Gate::define('delete_income', function(User $user) {
            return in_array($user->user_type, [1, 3]);
        });
         //This allows user to view income option
        Gate::define('view_income_option', function(User $user) {
            return in_array($user->user_type, [1, 3]);
        });


         //This allows user to edit expenses
            Gate::define('add_expenses', function(User $user) {
            return in_array($user->user_type, [1, 3]);
        });
         //This allows user to edit expenses information
        Gate::define('edit_expenses', function(User $user) {
            return in_array($user->user_type, [1, 3]);
        });
         //This allows user to delete expenses information
        Gate::define('delete_expenses', function(User $user) {
            return in_array($user->user_type, [1, 3]);
        });
         //This allows user to view expenses option
        Gate::define('view_expenses_option', function(User $user) {
            return in_array($user->user_type, [1, 3]);
        });
    }
}
