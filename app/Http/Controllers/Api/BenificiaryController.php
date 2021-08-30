<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Benificiary;
use DateTime;
use Illuminate\Http\Request;

class BenificiaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Benificiary::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Array $data)
    {
        try {
            $done = Benificiary::crete($data);
            if($done){
                return true;
            }else{
                return false;
            }
        } catch (\Throwable $th) {
            return false;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Benificiary  $benificiary
     * @return \Illuminate\Http\Response
     */
    public function show(String $uuid)
    {
        return Benificiary::find($uuid)->first();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Benificiary  $benificiary
     * @return \Illuminate\Http\Response
     */
    public function update(Array $data, String $uuid)
    {
        $toUpdate = $this->show($uuid);
        if($toUpdate){
           try {
            $toUpdate->update($data);
            return true;
           } catch (\Throwable $th) {
            return false;
           }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Benificiary  $benificiary
     * @return \Illuminate\Http\Response
     */
    public function destroy(String $uuid)
    {
        $toUpdate = $this->show($uuid);
        if($toUpdate){
           try {
            $toUpdate->delete();
            return true;
           } catch (\Throwable $th) {
            return false;
           }
        }
    }

    public function createdAfter()
    {
        $createdAt = $this->lastSync();
       return Benificiary::where('neighborhood_uuid',auth()->user()->neighborhood_uuid)
        ->where('created_at','>',$createdAt)->get();
    }

    public function updatedAfter()
    {
        $updatedAt = $this->lastSync();
       return Benificiary::where('neighborhood_uuid',auth()->user()->neighborhood_uuid)
        ->where('updated_at','>',$updatedAt)->get();
    }

    public function daletedAfter( )
    {
        $daletedAt = $this->lastSync();
       return Benificiary::where('neighborhood_uuid',auth()->user()->neighborhood_uuid)
        ->where('updated_at','>',$daletedAt)->get();
    }
    private function lastSync()
    {
        return auth()->user()->lastSync()->orderBy('last_sync_at','asc')->first()->last_sync_at;
    }

}