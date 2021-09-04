<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\NeighborhoodsRequest;
class NeighborhoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
        $getAll = DB::table('neighborhoods')->get();
        
        return view('web.backend.admin.neighborhoods.index')->with('neighborhoods',$getAll);

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

        try {

            $getAll = DB::table('provinces')->get();
            if(!$getAll->isEmpty()){
                return view('web.backend.admin.neighborhoods.create')->with('provinces',$getAll);
            }

            return;

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
    public function store(NeighborhoodsRequest $request)
    {
        try {
            $getAll = DB::table('neighborhoods')->get();
            if($getAll->contains(collect($request->all())->toArray())){
                return ;
            }
            DB::table('neighborhoods')->insert([
                'uuid'=>$request->uuid,
                'name'=>$request->name,
                'province_uuid'=>$request->province_uuid
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
            $foundData = DB::table('neighborhoods')->where('uuid',$uuid)->get();
           if($foundData!=null){
               
               return view('web.backend.admin.neighborhoods.show')->with('neighborhood',$foundData);
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
            $get =DB::table('provinces')->get();
            $neighborhood = DB::table('neighborhoods')->where('uuid',$uuid)->get();
           
            if($neighborhood!=null){
               return view('web.backend.admin.neighborhoods.edit')
               ->with('neighborhoods',$neighborhood)->with('provinces',$get);
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
    public function update(NeighborhoodsRequest $request, $uuid)
    {
        $neighborhood = DB::table('neighborhoods')->where('uuid',$uuid)->get();
        $neighborhood->update([
            'uuid'=>$request->uuid,
            'name'=>$request->name,
            'province_uuid'=>$request->province_uuid
        ]);

        return 'teste';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
       try {
        $getAll = DB::table('neighborhoods')->get();
        $datafound = DB::table('neighborhoods')->where('uuid',$uuid);
        if($datafound!=null){
            
            $datafound->delete();

            return redirect()->back();
        }
       } catch (\Throwable $th) {
           throw $th;
       }
       
       
        
        return 'province deleted successfully';
    }
    
}
