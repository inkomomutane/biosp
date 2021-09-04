<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpecifyTheProposRequest extends FormRequest
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
            'uuid'=>'required|string',
            'purpose_of_visit_uuid'=>'required',
            'benificiary_uuid'=>'required',
            'specify_the_propose'=>'required|string|unique:specify_the_propose'
        ];
    }
}
