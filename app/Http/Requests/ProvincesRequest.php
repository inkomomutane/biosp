<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProvincesRequest extends FormRequest
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
            'name'=>'required|string'
        ];
    }

    public function massege(){
        return [
        'uuid.required'=>'please writter this field',
        'name.required'=>'please writter this field'
        ];
    }
}
