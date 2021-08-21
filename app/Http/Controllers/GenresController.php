<?php

namespace App\Http\Controllers;
use App\Models\Genre;
use App\Http\Requests\GenresRequest;
use Illuminate\Http\Request;

class GenresController extends Controller
{
    
    public function index()
    {
        try {

            $data = Genre::all();

            return response()->json(['Genres:'=>$data]);

        } catch (\Throwable $th) {

            throw $th;
        }
    }

    public function store(GenresRequest $request)
    {
        
        try {
            Genre::create(collect(['name'=>$request->name])->toArray());

            return response()->json(['message:'=>'data of provinces keep with successfly']);  

        } catch (\Throwable $th) {
            dd($th);
        }
      
    }

    
    public function show($id)
    {
        try {
           $data = Genre::find($id);

        if($data!=null){
             
            return response()->json(['Genre:'=>$data]);
        }
            return  response()->json(['message:'=>'Genre not found']);

        } catch (\Throwable $th) {
            throw $th;
        }
    }

  

    public function update(Request $request, $id)
    {

    }

  
    public function destroy($id)
    {
        try {
            $data = Genre::find($id);
 
         if($data!=null){
              
             $data->delete();

             return response()->json(['Genre:'=>$data]);
         }
             return  response()->json(['message:'=>'Genre not found']);
 
         } catch (\Throwable $th) {
             throw $th;
         }
    }
}
