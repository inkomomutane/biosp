<?php

namespace App\Http\Requests\Biosp;

use Illuminate\Foundation\Http\FormRequest;

class BiospAssignServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->hasRole('super-admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'services' => 'array'
        ];
    }
}
