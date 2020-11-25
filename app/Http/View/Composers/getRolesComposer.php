<?php

namespace App\Http\View\Composers;

use App\Models\Role;
use Illuminate\View\View;

class getRolesComposer
{
    public function compose(View $view)
    {
        if (auth()->user()->isAdmin())
            $view->with('roles', Role::oldest('id')->get());
        else
            $view->with('roles', Role::oldest('id')
                ->whereNotIn('id', [2, 3])
                ->get());
    }
}
