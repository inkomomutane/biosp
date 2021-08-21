<?php

namespace App\Http\Controllers;
use App\Models\Province;
use App\Models\OauthAccessToken;
use App\Http\Requests\ProvincesRequest;
use Illuminate\Http\Request;
use App\Models\Synchronization;

class ProvincesController extends Controller
{
    
  
    public function index()
    {
        try {

            $data = Province::all();

            return response()->json(['Province:'=>$data]);

        } catch (\Throwable $th) {

            throw $th;
        }
        
    }

    public function store(ProvincesRequest $provinces)
    {
  
        try {
            Province::create($provinces->all());
            return response()->json(['message'=>'data of provinces keep with successfly']);  
        } catch (\Throwable $th) {
            dd($th);
        }
        
    }

 
    public function show($id)
    {
        try {
            $data = Province::find($id);

        if($data!=null){
            
            return response()->json(['Province'=>$data]);
        }
            return  response()->json(['message'=>'Province not found']);

        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function update(Request $province, $id)
    {

    }
    
 
   public function destroy($id)
    {
       
        try {
            
            $data = Province::find($id);

            if($data!=null){
         
                 $data->delete();
         
                 return response()->json(['message'=>'Neighborhood deleted with successefly']);
             }
                
                return  response()->json(['message'=>'Neighborhood not found']);

             } catch (\Throwable $th) {
        
                    throw $th;
              }
    }
       
}
