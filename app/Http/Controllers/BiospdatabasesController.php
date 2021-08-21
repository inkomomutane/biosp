<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Biospdatabase;
use App\Models\DocumentType;
use App\Models\Genres;
use App\Models\Province;
use App\Models\PurposeOfVisit;
use App\Models\ReasonOpeningCase;
use App\Http\Resources\BiospdatabaseResource;
use App\Models\User;
use DB;
use App\Http\Requests\BiospdatabasesRequest;

class BiospdatabasesController extends Controller
{
    public function index()
    {
       
        $data = DB::table('biospdatabases')->get();   
        return BiospdatabaseResource::collection($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            
            Biospdatabase::create(
                [
                'uuid'=>$request->uuid,
                'full_name'=>$request->full_name,
                'number_of_visits'=>$request->number_of_visits,
                'birth_date'=>$request->birth_date,
                'phone'=>$request->phone,
                'birth_date'=>$request->birth_date,
                'home_care'=>$request->home_care,
                'purpose_of_visit '=>$request->purpose_of_visit,
                'date_received'=>$request->date_received,
                'status'=>$request->status,
                'document_types_id '=>$request->document_types_id,
                'genres_id'=>$request->genres_id,
                'addresses_id'=>$request->addresses_id,
                'forwarded_services_id'=>$request->forwarded_services_id,
                'reason_opening_cases_id'=>$request->reason_opening_cases_id,
                'purpose_of_visits_id'=>$request->purpose_of_visits_id
                ]
            );
            return response()->json(['message'=>'insert in table biospdatabase with successfly']);  

        } catch (\Throwable $th) {
            dd($th);
        }
       

    }   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $data = Biospdatabase::find($id);
 
         if($data!=null){
             
             $data->delete();
             
             return response()->json(['message'=>' deleted register with successefly']);
         }
             return  response()->json(['message'=>'document not found']);
 
         } catch (\Throwable $th) {
             throw $th;
         }
    }
}
