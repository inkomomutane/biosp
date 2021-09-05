<?php

namespace App\Http\Controllers;
use App\Models\Benificiary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\BenificiaryResource;
class BenificiariesController extends Controller
{
    public function index()
    {
       // $getAll = BenificiaryResource::collection(Benificiary::all());
        $getAll = DB::table('benificiaries')->get();
        return view('web.backend.admin.benificiaries.index')->with('benificiaries',$getAll)->with('');
    }

    public function create()
    {
        return view('web.backend.admin.benificiaries.create');
    }
}
