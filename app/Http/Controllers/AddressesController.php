<?php

namespace App\Http\Controllers;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['address'=>Address::all()]);
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
    public function store(Request $request)
    {
        $address=$request->validate([
            'name' => 'required|string'
        ]);
        $address = new Address();
        $address['name']=$request->name;
        ;
        if ($address->save()) {
         
            return response()->json($address,200);
        }
        
             return response()->json("",401);
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
        $address = Address::find($id);
        


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $address =Address::find($id);
        $address->delete();
        return response()->json(['message'=>'address delered successfly']);
    }

    public function allDelete(Request $request)
    {
        Address::WhereIn('id',$request->all())->delete();
    }

    public function allUpdate(Request $request)
    {
        
        foreach($request->get()->toString() as $address){
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
    
}