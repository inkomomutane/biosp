<?php

namespace App\Http\Controllers;
use App\Models\DocumentType;
use Illuminate\Http\Request;
use App\Http\Requests\DocumentTypeRequest;

class DocumentTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            
            $data = DocumentType::all();

            return response()->json(['docements'=>$data]);

        } catch (\Throwable $th) {
            throw $th;
        }

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentTypeRequest $request)
    {
        try {
            
            DocumentType::create(collect(['name'=>$request->name])->toArray());
            
            return response()->json(['message'=>'data of document keep with successfly']); 
             
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

        try {
            $data = DocumentType::find($id);

        if($data!=null){
            
            return response()->json(['document'=>$data]);
        }
            return  response()->json(['message'=>'document not found']);

        } catch (\Throwable $th) {
            throw $th;
        }
        
        
    }

    
   
    public function update(DocumentTypeRequest $request, $id)
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
           $data = DocumentType::find($id);

        if($data!=null){
            
            $data->delete();
            
            return response()->json(['message'=>'Document deleted with successefly']);
        }
            return  response()->json(['message'=>'document not found']);

        } catch (\Throwable $th) {
            throw $th;
        }

    }
}
