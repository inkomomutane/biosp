<?php

namespace App\Http\Controllers;

use App\Exports\Biosp as BiospExport;
use App\Models\Benificiary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\BenificiaryResource;
use App\Imports\Biosp as BiospImport;
use App\Models\ForwardedService;
use App\Models\Genre;
use App\Models\Neighborhood;
use App\Models\Provenace;
use App\Models\Province;
use App\Models\PurposeOfVisit;
use App\Models\ReasonOpeningCase;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Mockery\Generator\Generator;

use function PHPUnit\Framework\containsEqual;

class BenificiariesController extends Controller
{

    public function importCollection($dataCollection, $bairro)
    {
        $collection = Excel::toCollection(new BiospImport, storage_path('SA.xlsx'));
        $data = $dataCollection;
        $collection[0][0][0] .= '-' . $bairro;
        for ($i = 0; $i < $data->count(); $i++) {
            $collection[0][3 + $i] = collect($data[$i])->values();
        }
        return Excel::download(new BiospExport($collection), "Relatório do bairro de " . $bairro . " " . date_format(now(), "d-M-Y") . '.xlsx');
    }

    public function lastMonth(Neighborhood $bairro)
    {
        return  $this->importCollection(BenificiaryResource::collection(Benificiary::where('neighborhood_uuid', $bairro->uuid)->whereMonth('service_date', (now()->month - 1))->get()), $bairro->name);
    }

    public function thisMonth(Neighborhood $bairro)
    {
        return  $this->importCollection(BenificiaryResource::collection(Benificiary::where('neighborhood_uuid', $bairro->uuid)->whereMonth('service_date', (now()->month))->get()), $bairro->name);
    }

    public function allByNeighborhood(Neighborhood $bairro)
    {
        return  $this->importCollection(BenificiaryResource::collection(Benificiary::where('neighborhood_uuid', $bairro->uuid)
            ->get()), $bairro->name);
    }

    public function all()
    {
        return  $this->importCollection(BenificiaryResource::collection(Benificiary::all()), 'Todos');
    }


    public function filtro(Request $request)
    {
        $request->validate([
            'minAge' => 'nullable|integer|min:0',
            'maxAge' => 'nullable|integer|max:500'
        ]);
        $queries =  $request;
        $visits = Benificiary::all()->unique('number_of_visits')->pluck('number_of_visits');
        $visitsPlus5 = Benificiary::where('number_of_visits', '>=', 5)->get()->unique('number_of_visits')->pluck('number_of_visits');
        $auxQueries = $request->number_of_visits;
        if ($auxQueries != null && array_search(5, $auxQueries) !== false) {
            foreach ($visitsPlus5 as $value) {
                array_push($auxQueries, $value);
            }
        }

        // dd($auxQueries);
        // dd($queries->all());
        return $this->importCollection(BenificiaryResource::collection(
            Benificiary::whereIn('neighborhood_uuid', $queries->neighborhood_uuid != NULL ? $queries->neighborhood_uuid :  Neighborhood::all()->pluck('uuid'))
                ->WhereIn('genre_uuid', $queries->genre_uuid != NULL ? $queries->genre_uuid : Genre::all()->pluck('uuid'))
                ->WhereIn('provenace_uuid', $queries->provenace_uuid != NULL ? $queries->provenace_uuid :  Provenace::all()->pluck('uuid'))
                ->WhereIn('purpose_of_visit_uuid', $queries->purpose_of_visit_uuid != NULL ? $queries->purpose_of_visit_uuid :  PurposeOfVisit::all()->pluck('uuid'))
                ->WhereIn('reason_opening_case_uuid', $queries->reason_opening_case_uuid != NULL ? $queries->reason_opening_case_uuid :  ReasonOpeningCase::all()->pluck('uuid'))
                ->WhereIn('forwarded_service_uuid', $queries->forwarded_service_uuid != NULL ? $queries->forwarded_service_uuid :  ForwardedService::all()->pluck('uuid'))
                ->WhereIn('number_of_visits', $queries->number_of_visits != NULL
                    ? $auxQueries
                    : $visits)
                ->whereDate('service_date', '>=', \Carbon\Carbon::parse($queries->start_date))
                ->whereDate('service_date', '<=', \Carbon\Carbon::parse($queries->end_date))
                ->WhereYear('birth_date', '>=', $queries->maxAge != null ? (now()->year -  $queries->maxAge)  : 0)
                ->WhereYear('birth_date', '<=', $queries->minAge != null ? (now()->year -  $queries->minAge)  :  now()->year)
                ->get()
        ), '[Filtrado]');
    }
}
