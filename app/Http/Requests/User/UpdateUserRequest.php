<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Unique;

class UpdateUserRequest extends FormRequest
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

            'name' => ['required', 'string', 'max:255'],
            'email' => ['required'] , ['email'],'unique:users,email,'.$this->user->email . ',' . $this->user->uuid ,
            'password' => ['string', 'min:8', 'confirmed','nullable'],
        ];
    }
}
