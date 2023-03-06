<?php

namespace App\Providers;

use App\Models\AuthPermission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

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
        $providerPermission = AuthPermission::all();
        view()->share('providerPermission', $providerPermission);
        config(['app.locale' => 'id']);
        
    }
}
