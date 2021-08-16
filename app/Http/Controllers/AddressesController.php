<?php

namespace App\Http\Controllers;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class AddressesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $names)
    {
        
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
    public function store(Request $names)
    {
      
      
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //found one address especify
        return ($address = Address::find($id));
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
    public function update(Request $request, $id)
    {
    

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
    }
/*
    public function allDelete(Colletion $request)
    {
        Address::WhereIn('id',$request->all())->delete();
    }

    public function allUpdate(Request $request)
    {
        
        
        foreach($request->all() as $address){
            Address::WhereIn($address->id)->update([
                'name'=>$address['name']
            ]);
        }
    return response()->json("",200);}

    public function allStore(Address $request)
    {

       foreach($request->all()->toString() as $address){
          Address::create([
                'name'=>$address['name']
            ]);
        }
    return response()->json('',200);}
    */
}