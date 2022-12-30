<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function change(String $lang)
    {
        $languages = config('app.avaliable_locates');
        if(in_array($lang,array_values($languages))) {
             Session::put(['lang'=> $lang]);
         }
         return back();
    }
}
