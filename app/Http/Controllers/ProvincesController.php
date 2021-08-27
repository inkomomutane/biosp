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
   
        $getAll = DB::table('provinces')->get();
        return view('web.backend.admin.provinces.index')->with('provinces',$getAll);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProvincesRequest $request)
    {
        
       $getAll =DB::table('provinces')->get();

        if($getAll->contains(collect($request->all()))){
           
            return true ;
        }
        
        $result= DB::table('provinces')->insert([
            'uuid'=>$request->uuid,
            'name'=>$request->name
        ]);

       return 'province created successfully.';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $datafound = DB::table('provinces')->where('uuid',$uuid);
        if($datafound!=null){
            $datafound['name']= $request->name;
            $datafound->update();
        return 'province updated successfully';
    }

    return 'invalid deleted register';
        
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
        
        return 'province deleted successfully';
    }

    return 'invalid deleted register';
    //$users = DB::table('users')->orderBy('id')->cursorPaginate(15);
    
    }
}
