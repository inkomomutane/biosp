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
        try {
    
            
            return view('web.backend.admin.benificiaries.index')
            ->with('benificiaries',BenificiaryResource::collection(Benificiary::all()));

        } catch (\Throwable $th) {
            
            throw $th;
        }
   
      
    }

    public function create()
    {
        return view('web.backend.admin.benificiaries.create');
    }
}
