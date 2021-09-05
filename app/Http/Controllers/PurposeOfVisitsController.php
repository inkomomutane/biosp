<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PurposeOfVisit;
use Illuminate\Support\Facades\DB;
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
        $getAll = DB::table('purpose_of_visits')->get();

        return view('web.backend.admin.purpose_of_visits.index')->with('purpose_of_visits',$getAll);

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
        return view('web.backend.admin.purpose_of_visits.create');
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
            
            PurposeOfVisit::create([
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
            $foundData = DB::table('purpose_of_visits')->where('uuid',$uuid)->get();
           if($foundData!=null){
               
               return view('web.backend.admin.purpose_of_visits.show')->with('purpose_of_visits',$foundData);
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
           
            $purpose_of_visits = DB::table('purpose_of_visits')->where('uuid',$uuid)->get();
           
            if($purpose_of_visits!=null){
               return view('web.backend.admin.purpose_of_visits.edit')
               ->with('purpose_of_visits',$purpose_of_visits);
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
    public function update(PurposeOfVisitsRequest $request, $uuid)
    {
     
        try {

            $datafound = DB::table('purpose_of_visits')->where('uuid',$uuid);
            
            $datafound->update([
                    'name'=>$request->name,
                ]);
       
                return redirect()->route('purposeofvisits.index') ->with('success', 'Updated successfully!'); 
       
            } catch (\Throwable $th) {
            //throw $th;
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
        $datafound = DB::table('purpose_of_visits')->where('uuid',$uuid);
        
        if($datafound!=null){
            
            $datafound->delete();
        
        return redirect()->back();
    }

    return redirect()->back() ->with('error', 'Error during the creation!');
    
    }
}
