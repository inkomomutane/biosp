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
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class Sync extends Controller
{

    public function ben()
    {
        return Benificiary::where('neighborhood_uuid', Auth::user()->neighborhood_uuid)->get();
    }

    public function addCreated(Request  $request)
    {
        $errorOnCreating = Array();
        $created = $request->all();

        foreach ($created as $ben) {

            try {
                Benificiary::create($ben);
               } catch (\Throwable $th) {
                   return $th;
                   array_push($errorOnCreating,$ben);
               }
        }
        return $errorOnCreating;
    }

    public function updateUpdated(Request  $request)
    {
        $errorOnUpdating = Array();
        $updated = $request->all();

        foreach ($updated as $ben) {
           try {
            Benificiary::where('uuid',$ben['uuid'])->get()->first()->update($ben);
           } catch (\Throwable $th) {
               array_push($errorOnUpdating,$ben);
           }
        }
        return $errorOnUpdating;
    }

    public function deleteDeleted(Request $request)
    {
        $errorOnDeleting = Array();
        $deleted = $request->all();
        foreach ($deleted as $ben) {
            try {
                Benificiary::where('uuid',$ben['uuid'])->get()->first()->delete();
               } catch (\Throwable $th) {
                   return $th;
                   array_push($errorOnDeleting,$ben);
               }
        }
        return $errorOnDeleting;
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
            'benificiaries' => $this->ben()
        ];
    }
}
