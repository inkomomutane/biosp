<?php

namespace App\Http\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

/**
 *
 */
trait RemoveDuplicates
{
    private $model;
    private $toRemove  = array();
    private $uniqueKey;
    public function init(Model $model,String $uniqueKey)
    {
        $this->model  = $model;
        $this->uniqueKey  = $uniqueKey;
        $model::whereYear('service_date',now()->year)
        ->whereMonth('service_date','>=',( now()->month > 2 ? now()->month - 2 : 1 ))
        ->lazy()->each(function ($singleModel){
           $data = DB::table($singleModel->getTable())
           ->where(
            $this->queryParams($this->model->getFillable(),$singleModel->toArray())
            )->get();
            if($data->count()  > 1 ) {
               $this->toRemove =  Arr::collapse([
                    $this->toRemove,
                    $data->pluck($this->uniqueKey)->except(0)
                ]);

            }
        });

        //dd($this->toRemove);

        try {
         return  DB::table($model->getTable())->whereIn($uniqueKey,$this->toRemove)->delete();
        } catch (\Throwable $th) {
            //$th
        }
    }

    public function queryParams(array $object,$model) : array
    {
        foreach ($object as $key => $value) {
            $object[$value] = $model[$value];
            unset($object[$key]);
        }
        return $object;
    }



}

