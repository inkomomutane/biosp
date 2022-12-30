<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function change(string $lang)
    {
        $languages = config('app.avaliable_locates');
        if (in_array($lang, array_values($languages))) {
            Session::put(['lang' => $lang]);
        }

        return back();
    }
}
