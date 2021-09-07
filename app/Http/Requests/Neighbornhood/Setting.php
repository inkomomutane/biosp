<?php

namespace App\Http\Requests\Neighbornhood;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Setting extends FormRequest
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
            'name' => 'required',Rule::unique('neighborhoods')->ignore($this->name, 'name'),
        ];
    }
}
