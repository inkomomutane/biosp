<?php

namespace App\Http\Controllers;
use App\Models\Province;
use App\Models\OauthAccessToken;
use Illuminate\Http\Request;
use App\Models\Synchronization;

class ProvincesController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  response()->json(Province::all());
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
    
    public function deleted(Request  $request)
    {
      
        try {
                $delete= Province::WhereIn('id',collect($request->all()))->delete();
                return response()->json("number register deleted:"+$delete);
               
        } catch (\Throwable $th) {
            dd($th);
        }
       
      return "teste";
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function allstore(Request $request)
    {
     //validate the field name
        $this->validate($request,[
            'name' => 'required|string'
        ]);
        try {
        
            $arrayobj = Province::all()->pluck('name');
       
           if($arrayobj->contains($request->name)||collect($request->name)->isEmpty()){

              return ;
            }
        
            Province::create(collect(['name'=>$request->name])->toArray());
           
            return response()->json(['message'=>'data of provinces keep with successfly']);  

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
        return response()->json(Province::find(collect($id)));
    }

   // Str::upper('laravel')
  

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
    public function update(Request $request, $id)
    {
        

    }
    public function allupdate(Resquest $request)
    {
        try {
            $datadb = Province::all();

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
  /*  public function destroy($id)
    {
        $user =Auth::user();

        $destry = Privince::find($id);
        if($destroy->delete()){

            Synchronization::create([
                'uuid' =>$OauthAccessToken->id
            ]);
            return response()->json([
                 'message'=>'registed deleted with successfly'

            ]);
        }
        Synchronization::create([
            'uuid' =>$OauthAccessToken->id
        ]);
     return resnponse()->json(['impossible delete resgister']);}*/
}
