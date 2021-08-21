<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BiospdatabaseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'uuid'=>$this->uuid,
            'full_name'=>$this->full_name,
            'number_of_visits'=>$this->number_of_visits,
            'birth_date'=>$this->birth_date,
            'phone'=>$this->phone,
            'birth_date'=>$this->birth_date,
            'home_care'=>$this->home_care,
            'purpose_of_visit '=>$this->purpose_of_visit,
            'date_received'=>$this->date_received,
            'status'=>$this->status,
            'document_types_id '=>$this->document_types_id,
            'genres_id'=>$this->genres_id,
            'addresses_id'=>$this->addresses_id,
            'forwarded_services_id'=>$this->forwarded_services_id,
            'reason_opening_cases_id'=>$this->reason_opening_cases_id,
            'purpose_of_visits_id'=>$this->purpose_of_visits_id
        ];
    }
}
