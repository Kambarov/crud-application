<?php

namespace App\Providers;

use App\Http\View\Composers\getRolesComposer;
use App\Http\View\Composers\StatisticsComposer;
use App\Models\Role;
use Illuminate\Support\Facades\View;
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
        View::composer('dashboard.index', StatisticsComposer::class);

        View::composer([
            'dashboard.users.create',
            'dashboard.users.edit'
        ], getRolesComposer::class);
    }
}
