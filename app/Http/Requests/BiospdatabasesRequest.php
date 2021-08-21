<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BiospdatabasesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'uuid'=>'required|string|unique:biospdatabases',
            'full_name'=>'required|string',
            'number_of_visits'=>'required|numeric',
            'birth_date'=>'required',
            'phone'=>'required|string',
            'birth_date'=>'required',
            'home_care'=>'required|string',
            'purpose_of_visit '=>'required|string',
            'date_received'=>'required',
            'status'=>'required|string',
            'document_types_id '=>'required',
            'genres_id'=>'required',
            'addresses_id'=>'required',
            'forwarded_services_id'=>'required',
            'reason_opening_cases_id'=>'required',
            'purpose_of_visits_id'
        ];
    }
}
