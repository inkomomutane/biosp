<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\ReasonOpeningCase;
use App\Http\Requests\ReasonOpeningCasesRequest;

class ReasonOpeningCasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
   try {
        $getAll = DB::table('reason_opening_cases')->get();

        return view('web.backend.admin.reason_opening_cases.index')->with('reason_opening_cases',$getAll);

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
        return view('web.backend.admin.reason_opening_cases.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReasonOpeningCasesRequest $request)
    {
        try {
            ReasonOpeningCase::create([
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
            $foundData = DB::table('reason_opening_cases')->where('uuid',$uuid)->get();
           if($foundData!=null){
               
               return view('web.backend.admin.reason_opening_cases.show')->with('reason_opening_cases',$foundData);
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
           
            $reason_opening_cases = DB::table('reason_opening_cases')->where('uuid',$uuid)->get();
           
            if($reason_opening_cases !=null){
               return view('web.backend.admin.reason_opening_cases.edit')
               ->with('reason_opening_cases',$reason_opening_cases);
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
    public function update(ReasonOpeningCasesRequest $request, $uuid)
    {
     
        try {


            $datafound = ReasonOpeningCase::find($uuid);
            
            $datafound->update([
                    'name'=>$request->name,
                ]);
       
                return redirect()->route('purposeofvisits.index') ->with('success', 'Updated successfully!');
       
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
        $datafound = ReasonOpeningCase::find($uuid);

        if($datafound!=null){
            
            $datafound->delete();
            
        }
        
        return redirect()->back() ->with('error', 'Error during the creation!');
    }

   
    
    
}
