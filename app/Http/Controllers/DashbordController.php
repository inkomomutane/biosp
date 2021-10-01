<?php

namespace App\Http\Controllers;

use App\Models\Benificiary;
use App\Models\ForwardedService;
use App\Models\Genre;
use App\Models\Neighborhood;
use App\Models\Provenace;
use App\Models\PurposeOfVisit;
use App\Models\ReasonOpeningCase;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class DashbordController extends Controller
{

    private $startDate;
    private $endDate;
    private $visits;
    private $queries;
    private $auxQueries;
    private $visitsPlus5;


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.dashboard')->with([
            'bairros' => Neighborhood::whereNotIn('uuid', ['3e6816de-ade8-3902-bdb5-11393d32badd'])->get(),
            'generos' => Genre::all(),
            'proviniencias' => Provenace::all(),
            'razoes_das_visitas' => PurposeOfVisit::all(),
            'motivos_de_abertura_de_processos' => ReasonOpeningCase::all(),
            'servicos_encaminhados' => ForwardedService::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function todayData()
    {
        Neighborhood::where('uuid')->where('created_at')->dd();
        return Neighborhood::all()->pluck('uuid', 'name')->map(function ($uuid) {
            return Benificiary::whereDay('service_date', '>=', Date::today()->day)
                ->where('neighborhood_uuid', $uuid)->count();
        })->toArray();
    }

    public function filterDate($startDate = null, $endDate = null)
    {
        $this->startDate = $startDate != null ? $startDate : today();
        $this->endDate = $endDate != null ? $endDate : today();
        $data = Neighborhood::whereNotIn('uuid', ['3e6816de-ade8-3902-bdb5-11393d32badd'])
            ->pluck('uuid', 'name')->map(function ($uuid) {
                return Benificiary::where('neighborhood_uuid', $uuid)
                    ->whereDate('service_date', '>=', Carbon::parse($this->startDate))
                    ->whereDate('service_date', '<=', Carbon::parse($this->endDate))
                    ->count();
            });
        return [
            'keys'  => collect($data)->keys(),
            "values" => collect($data)->values(),
            'data' => collect($data)
        ];
    }


    public function filtro(Request $request)
    {
        $request->validate([
            'minAge' => 'nullable|integer|min:0',
            'maxAge' => 'nullable|integer|max:500'
        ]);
        $this->queries =  $request;
        $this->visits = Benificiary::all()->unique('number_of_visits')->pluck('number_of_visits');
        $this->visitsPlus5 = Benificiary::where('number_of_visits', '>=', 5)->get()->unique('number_of_visits')->pluck('number_of_visits');
        $this->auxQueries = $request->number_of_visits;
        if ($this->auxQueries != null && array_search(5, $this->auxQueries) !== false) {
            foreach ($this->visitsPlus5 as $value) {
                array_push($this->auxQueries, $value);
            }
        }

        $data = Neighborhood::whereIn('uuid', $this->queries->neighborhood_uuid != NULL ? $this->queries->neighborhood_uuid :  Neighborhood::all()->pluck('uuid'))
            ->pluck('uuid', 'name')->map(function ($uuid) {
          return  Benificiary::where('neighborhood_uuid', $uuid)
                ->WhereIn('genre_uuid', $this->queries->genre_uuid != NULL ? $this->queries->genre_uuid : Genre::all()->pluck('uuid'))
                ->WhereIn('provenace_uuid', $this->queries->provenace_uuid != NULL ? $this->queries->provenace_uuid :  Provenace::all()->pluck('uuid'))
                ->WhereIn('purpose_of_visit_uuid', $this->queries->purpose_of_visit_uuid != NULL ? $this->queries->purpose_of_visit_uuid :  PurposeOfVisit::all()->pluck('uuid'))
                ->WhereIn('reason_opening_case_uuid', $this->queries->reason_opening_case_uuid != NULL ? $this->queries->reason_opening_case_uuid :  ReasonOpeningCase::all()->pluck('uuid'))
                ->WhereIn('forwarded_service_uuid', $this->queries->forwarded_service_uuid != NULL ? $this->queries->forwarded_service_uuid :  ForwardedService::all()->pluck('uuid'))
                ->WhereIn('number_of_visits', $this->queries->number_of_visits != NULL
                    ? $this->auxQueries
                    : $this->visits)
                ->whereDate('service_date', '>=', \Carbon\Carbon::parse($this->queries->start_date))
                ->whereDate('service_date', '<=', \Carbon\Carbon::parse($this->queries->end_date))
                ->WhereYear('birth_date', '>=', $this->queries->maxAge != null ? (now()->year -  $this->queries->maxAge)  : 0)
                ->WhereYear('birth_date', '<=', $this->queries->minAge != null ? (now()->year -  $this->queries->minAge)  :  now()->year)
                ->count();
            });
                return [
                    'keys'  => collect($data)->keys(),
                    "values" => collect($data)->values(),
                    'data' => collect($data)
                ];
    }
}
