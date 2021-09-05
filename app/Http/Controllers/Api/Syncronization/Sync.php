<?php

namespace App\Http\Controllers\Api\Syncronization;

use App\Http\Controllers\Controller;
use App\Models\DocumentType;
use App\Models\ForwardedService;
use App\Models\Genre;
use App\Models\Neighborhood;
use App\Models\Provenace;
use App\Models\PurposeOfVisit;
use App\Models\ReasonOpeningCase;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BenificiaryController as Server;
use App\Models\Benificiary;
use Illuminate\Support\Facades\Auth;

class Sync extends Controller
{

    public function ben()
    {
        return Benificiary::where('neighborhood_uuid', Auth::user()->neighborhood_uuid)->get();
    }

    public function addCreated(Request  $request)
    {
        $server =  new Server();
        try {
            return $server->store($request->all());
        } catch (\Throwable $th) {
            return false;
        }
        return false;
    }

    public function updateUpdated(Request  $request, Benificiary $benificiary)
    {
        $server =  new Server();
        try {
            return $benificiary->update($request->all());
        } catch (\Throwable $th) {
            return false;
        }
        return false;
    }

    public function deleteDeleted(Benificiary $benificiary)
    {
        try {
            return $benificiary->delete();
        } catch (\Throwable $th) {
            return false;
        }
        return false;
    }


    public function settings()
    {
        return [
            'document_types' => DocumentType::all(),
            'forwarded_services' => ForwardedService::all(),
            'genres' => Genre::all(),
            'neighborhoods' => Neighborhood::where('uuid', auth()->user()->neighborhood_uuid)
                ->get(),
            'provenances' => Provenace::all(),
            'propuses_of_visits' => PurposeOfVisit::all(),
            'reason_of_opening_cases' => ReasonOpeningCase::all(),
        ];
    }
}
