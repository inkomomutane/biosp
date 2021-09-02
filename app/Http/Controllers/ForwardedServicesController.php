<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ForwardedServicesRequest;

class ForwardedServicesController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
   try {
        $getAll = DB::table('forwarded_services')->get();

        return view('web.backend.admin.forwarded_services.index')->with('forwarded_services',$getAll);

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
        return view('web.backend.admin.forwarded_services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ForwardedServicesRequest $request)
    {
        try {
            DB::table('forwarded_services')->insert([
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
            $foundData = DB::table('forwarded_services')->where('uuid',$uuid)->get();
           if($foundData!=null){
               
               return view('web.backend.admin.forwarded_services.show')->with('forwarded_services',$foundData);
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
           
            $forwarded_services = DB::table('forwarded_services')->where('uuid',$uuid)->get();
           
            if($forwarded_services!=null){
               return view('web.backend.admin.forwarded_services.edit')
               ->with('forwarded_services',$forwarded_services);
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
    public function update(ForwardedServicesRequest $request, $uuid)
    {
     
        try {

            $datafound = DB::table('forwarded_services')->where('uuid',$uuid);
            
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
        $datafound = DB::table('forwarded_services')->where('uuid',$uuid);
        
        if($datafound!=null){
            
            $datafound->delete();
        
        return redirect()->back();
    }

    return redirect()->back() ->with('error', 'Error during the creation!');
    
    }
}
