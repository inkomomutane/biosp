<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Provenace;
use App\Http\Requests\ProvenacesRequest;
class ProvenacesContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $getAll = DB::table('provenaces')->get();
    
            return view('web.backend.admin.provenaces.index')->with('provenaces',$getAll);
    
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
        return view('web.backend.admin.provenaces.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProvenacesRequest $request)
    {
        try {

            Provenace::create([
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
            $foundData = DB::table('provenaces')->where('uuid',$uuid)->get();
           
            if($foundData!=null){
               
               return view('web.backend.admin.provenaces.show')->with('provenaces',$foundData);
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
           
            $provenaces = DB::table('provenaces')->where('uuid',$uuid)->get();
           
            if($provenaces!=null){
               return view('web.backend.admin.provenaces.edit')
               ->with('provenaces',$provenaces);
           }

           return 'register not found';

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
    public function update(ProvenacesRequest $request, $uuid)
    {
        try {

            $datafound = DB::table('provenaces')->where('uuid',$uuid);
            
            $datafound->update([
                    'name'=>$request->name,
                ]);
       
                return redirect()->back() ->with('success', 'Created successfully!');
       
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
        $datafound = DB::table('provenaces')->where('uuid',$uuid);
        
        if($datafound!=null){
            
            $datafound->delete();
        
        return redirect()->back();
    }

    return redirect()->back() ->with('error', 'Error during the creation!');
    
    }
    
}
