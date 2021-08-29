<?php

namespace App\Http\Controllers;
use App\Models\Benificiary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class BenificiariesController extends Controller
{
    public function index()
    {
        $getAll = DB::table('benificiaries')->get();
        return view('web.backend.admin.benificiaries.index')->with('benificiaries',$getAll)->with('');
    }
}
