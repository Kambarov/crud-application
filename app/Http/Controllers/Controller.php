<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function success($text)
    {
        $this->sendAlert('success', $text);
    }

    protected function info($text)
    {
        $this->sendAlert('info', $text);
    }

    protected function error($text)
    {
        $this->sendAlert('error', $text);
    }

    private function sendAlert($type, $text)
    {
        request()->session()->flash($type, $text);
    }
}
