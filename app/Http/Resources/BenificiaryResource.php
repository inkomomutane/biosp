<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BenificiaryResource extends JsonResource
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
            'full_name'=>$this->full_name,
            'number_of_visits'=>$this->number_of_visits,
            'birth_date'=>$this->birth_date,
            'phone'=>$this->phone,
            'service_date'=>$this->service_date,
            'home_care'=>$this->home_care,
            'date_received'=>$this->date_received,
            'status'=>$this->status,
            'other_document_type'=>$this->other_document_type,
            'other_reason_opening_case'=>$this->other_reason_opening_case,
            'forwarded_correct_service_uuid'=> $this->forwarded_service,
            'other_forwarded_service'=>$this->ther_forwarded_service,
            'specify_forwarded_service'=>$this->specify_forwarded_service,
            'visit_proposes'=>$this->visit_proposes,
            'neighborhood_uuid'=>$this->neighborhood->name,
            'genre_uuid'=>$this->genre->name,
            'provenace_uuid'=>$this->provenace->name,
            'reason_opening_case_uuid'=>$this->reason_opening_case->name,
            'document_type_uuid'=>$this->document_type->name,
            'purpose_of_visit_uuid'=>$this->purpose_of_visit->name,
            
            
            
            
            
            
         
            
        ];


    }
}
