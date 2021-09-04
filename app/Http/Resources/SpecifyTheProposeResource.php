<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SpecifyTheProposeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'purpose_of_visits'=>$this->purpose_of_visit,
            'benificiaries'=>$this->benificiary,
            'specify_the_propose'=>$this->specify_the_propose,
        ];
    }
}
