<?php

namespace App\Http\Controllers;
use App\Http\Requests\GenresRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class GenresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getAll = DB::table('genres')->get();
        return view('web.backend.admin.genres.index')->with('genres',$getAll);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('web.backend.admin.genres.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GenresRequest $request)
    {
        try {
            $getAll =DB::table('genres')->get();

            if($getAll->contains(collect($request->all()))){
               
                return true ;
            }
            
            $result= DB::table('genres')->insert([
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
               
               return view('web.backend.admin.genres.show')->with('genres',$foundData);
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
           
            $genres = DB::table('genres')->where('uuid',$uuid)->get();
           
            if($genres!=null){
               return view('web.backend.admin.genres.edit')
               ->with('genres',$genres);
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
    public function update(GenresRequest $request, $uuid)
    {
        
        try {

            $datafound = DB::table('genres')->where('uuid',$uuid);
            
            $datafound->update([
                    'name'=>$request->name,
                ]);
       
               return redirect()->back() ;
       
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
    
    $datafound = DB::table('genres')->where('uuid',$uuid);
        
    if($datafound!=null){
            
            $datafound->delete();
        
        return redirect()->back();
    }

    return redirect()->back() ->with('error', 'Error during the creation!');
    
    }
    
}