<?php

namespace App\Http\Controllers;

use Flasher\Noty\Laravel\Facade\Noty;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return View
     */
    public function index()
    {
        Noty::addSuccess('Data has been saved successfully!');

        return view('pages.backend.home');
    }
}
