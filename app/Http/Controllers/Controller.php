<?php

namespace App\Http\Controllers;

use Flasher\Prime\FlasherInterface;
use Flasher\Prime\Notification\Envelope;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function flash(){
        return flash()->ripple(true)->position('y','top');
    }
}
