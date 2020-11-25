<?php

namespace App\Http\View\Composers;

use App\Models\Post;
use App\Models\User;
use Illuminate\View\View;

class StatisticsComposer
{
    public function compose(View $view)
    {
        #avg_salary to get the Average salary of users
        $view->with('avg_salary', User::avg('weekly_salary'));

        #users_count to get the count of all users
        $view->with('users_count', User::count());

        #posts_count to get the count of all Posts
        $view->with('posts_count', Post::count());
    }
}
