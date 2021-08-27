<?php

namespace App\Http\Controllers;
use App\Models\Benificiary;
use Illuminate\Http\Request;

class BenificiariesController extends Controller
{
    public function index()
    {
        $quey=Benificiary::all();
        return view('web.backend.admin.benificiaries.index')->with('benificiaries',$quey);
    }
}
