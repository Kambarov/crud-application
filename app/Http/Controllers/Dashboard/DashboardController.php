<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function setLocale($lang, Request $request)
    {
        if (in_array($lang, ['ru', 'en'])) {
            Cookie::queue('locale', $lang, 10000000);

            return redirect()->back();
        }

        return abort(404);
    }
}
