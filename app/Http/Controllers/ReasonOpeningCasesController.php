<?php

namespace App\Http\Controllers;
use App\Models\ReasonOpeningCase;
use App\Http\Requests\ReasonOpeningCasesRequest;
use Illuminate\Http\Request;

class ReasonOpeningCasesController extends Controller
{
   
    public function index()
    {
        try {
            
            $data = ReasonOpeningCase::all();

            return response()->json(['datas'=>$data]);

        } catch (\Throwable $th) {
            throw $th;
        }

    }

    public function store(ReasonOpeningCasesRequest $request)
    {

    try {

        ReasonOpeningCase::create(collect(['name'=>$request->name])->toArray());

        return response()->json(['message'=>'data of Reason Opening Case keep with successfly']);  

    } catch (\Throwable $th) {
        dd($th);
    }
  
    }

    public function show($id)
    {
        try {
            
            $data = ReasonOpeningCase::find($id);

            if($data!=null){
         
                 return response()->json(['Reason Opening Case:'=>$data]);
             }
                
                return  response()->json(['message'=>'Reason Opening Case not found']);

             } catch (\Throwable $th) {
        
                    throw $th;
              }
    }

 
    public function update(ReasonOpeningCasesRequest $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        try {
            $data = ReasonOpeningCase::find($id);
 
         if($data!=null){
             
             $data->delete();
             
             return response()->json(['message'=>'Document deleted with successefly']);
         }
             return  response()->json(['message'=>'Reason Opening Case not found']);
 
         } catch (\Throwable $th) {
             throw $th;
         }
    }
}
