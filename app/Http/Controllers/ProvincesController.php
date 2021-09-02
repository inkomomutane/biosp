<?php

namespace App\Http\Controllers;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProvincesRequest;
class ProvincesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
   try {
        $getAll = DB::table('provinces')->get();

        return view('web.backend.admin.provinces.index')->with('provinces',$getAll);

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
        return view('web.backend.admin.provinces.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProvincesRequest $request)
    {
        try {
            DB::table('provinces')->insert([
                'uuid'=>$request->uuid,
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
            $foundData = DB::table('provinces')->where('uuid',$uuid)->get();
           if($foundData!=null){
               
               return view('web.backend.admin.provinces.show')->with('provinces',$foundData);
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
           
            $provinces = DB::table('provinces')->where('uuid',$uuid)->get();
           
            if($provinces!=null){
               return view('web.backend.admin.provinces.edit')
               ->with('provinces',$provinces);
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
    public function update(ProvincesRequest $request, $uuid)
    {
     
        try {

            $datafound = DB::table('provinces')->where('uuid',$uuid);
            
            $datafound->update([
                    'name'=>$request->name,
                ]);
       
                return redirect()->back() ->with('success', 'Created successfully!');
       
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
        $datafound = DB::table('provinces')->where('uuid',$uuid);
        
        if($datafound!=null){
            
            $datafound->delete();
        
        return redirect()->back();
    }

    return redirect()->back() ->with('error', 'Error during the creation!');
    
    }
}
