<?php

namespace App\Http\Controllers;
use App\Models\PurposeOfVisit;
use Illuminate\Http\Request;
use App\Http\Requests\PurposeOfVisitsRequest;

class PurposeOfVisitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            
            $data = PurposeOfVisit::all();

            return response()->json(['datas'=>$data]);

        } catch (\Throwable $th) {
            throw $th;
        }

        
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
    public function store(PurposeOfVisitsRequest $request)
    {
        try {
            PurposeOfVisit::create(collect(['name'=>$request->name])->toArray());
            
            return response()->json(['message'=>'data of Purpose keep with successfly']);  

        } catch (\Throwable $th) {
            dd($th);
        }
      
    }


    public function show($id)
    {
        try {
            $data = PurposeOfVisit::find($id);

        if($data!=null){
            
            return response()->json(['data'=>$data]);
        }
            return  response()->json(['message'=>'Purpose of Visit not found']);

        } catch (\Throwable $th) {
            throw $th;
        }
    }

  
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
    public function update(PurposeOfVisitsRequest $request, $id)
    {
        
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
            $data = PurposeOfVisit::find($id);
 
         if($data!=null){
             
             $data->delete();
             
             return response()->json(['message'=>'Document deleted with successefly']);
         }
             return  response()->json(['message'=>'Purpose of Visit not found']);
 
         } catch (\Throwable $th) {
             throw $th;
         }
 
     }
    
}
