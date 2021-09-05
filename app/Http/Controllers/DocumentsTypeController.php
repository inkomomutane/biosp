<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DocumentType;
use App\Http\Requests\DocumetsTypeRequest;
class DocumentsTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getAll = DB::table('document_types')->get();
        return view('web.backend.admin.document_types.index')->with('document_types',$getAll);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('web.backend.admin.document_types.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocumetsTypeRequest $request)
    {
        try {
           
            DocumentType::create([
                'name'=>$request->name
            ]);
    
            return redirect()->back() ->with('success', 'Created successfully!');
        } catch (\Throwable $th) {
            return redirect()->back() ->with('error', 'Error during the creation!');
        }
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        try {
            $foundData = DB::table('document_types')->where('uuid',$uuid)->get();
           if($foundData!=null){
               
               return view('web.backend.admin.document_types.show')->with('document_types',$foundData);
           }

           return 'register not found';

        } catch (\Throwable $th) {
            
            throw $th;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        try {
           
            $document_types = DB::table('document_types')->where('uuid',$uuid)->get();
           
            if($document_types!=null){
               return view('web.backend.admin.document_types.edit')
               ->with('document_types',$document_types);
           }

        } catch (\Throwable $th) {
            
            throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DocumetsTypeRequest $request, $uuid)
    {
        try {

            $datafound = DB::table('document_types')->where('uuid',$uuid);
            
            $datafound->update([
                    'name'=>$request->name,
                ]);
       
               return redirect()->route('documents.index') ->with('success', 'Updated successfully!'); ;
       
            } catch (\Throwable $th) {
            
                throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        $datafound = DB::table('document_types')->where('uuid',$uuid);
        
        if($datafound!=null){
            
            $datafound->delete();
        
        return redirect()->back();
    }

    return redirect()->back() ->with('error', 'Error during the deleted!');
    
    }
}
