<?php

namespace App\Http\Controllers;

use App\Exports\Biosp as BiospExport;
use App\Models\Benificiary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\BenificiaryResource;
use App\Imports\Biosp as BiospImport;
use Maatwebsite\Excel\Facades\Excel;

class BenificiariesController extends Controller
{

    public function importCollection()
    {
        $collection = Excel::toCollection(new BiospImport, storage_path('SA.xlsx'));
        $data = BenificiaryResource::collection(Benificiary::all());

        for ($i=0; $i < $data->count() ; $i++) {
            $collection[0][3 + $i] = collect($data[$i])->values();
        }
        return Excel::download(new BiospExport($collection), "relatorio". now() .'.xlsx');
    }

    public function filteredBenificiaries(Request $request)
    {
    }



}
