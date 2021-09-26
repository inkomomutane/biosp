<?php

namespace App\Http\Controllers;

use App\Models\Benificiary;
use App\Models\Neighborhood;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class DashbordController extends Controller
{

    private $startDate;
    private $endDate;


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.dashboard')->with('bairros', []);
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
}
