<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;

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

        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');

        Gate::define('operator', function (User $user) {
            return $user->role == "operator";
        });

        Gate::define('kepsek', function (User $user) {
            return $user->role == "kepsek";
        });

        Gate::define('sekretaris', function (User $user) {
            return $user->role == "sekretaris";
        });
    }
}