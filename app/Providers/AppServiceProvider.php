<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
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
        View::composer('dashboard.index', function ($view) {
            #avg_salary to get the Average salary of users
            $view->with('avg_salary', User::avg('weekly_salary'));

            #users_count to get the count of all users
            $view->with('users_count', User::count());

            #posts_count to get the count of all Posts
            $view->with('posts_count', Post::count());
        });
    }
}
