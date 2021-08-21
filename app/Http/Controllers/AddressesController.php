<?php

namespace App\Http\Controllers;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Requests\AddressRequest;
use Illuminate\Database\Eloquent\Collection;

class AddressesController extends Controller
{
    
    public function index()
    {
        try {

            $data = Address::all();

            return response()->json(['Neighborhoods:'=>$data]);

        } catch (\Throwable $th) {

            throw $th;
        }
    }

    public function store(AddressRequest $address)
    {
        try {
           
            Address::create(
                ['name'=>$address->name,
                'province_id'=>$address->province_id
                ]
            );
            return response()->json(['message'=>'insert Neighborhood with successfly']);  

        } catch (\Throwable $th) {
            dd($th);
        }
    }

   
    public function show($id)
    {
        try {
            
            $data = Address::find($id);

            if($data!=null){
         
                 return response()->json(['Neighborhood:'=>$data]);
             }
                
                return  response()->json(['message'=>'Neighborhood not found']);

             } catch (\Throwable $th) {
        
                    throw $th;
              }
    }

    
    public function update(Request $request, $id)
    {
               dd($request->name);
    }

    
    public function destroy($id)
    {  
        
        try {
            
            $data = Address::find($id);

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