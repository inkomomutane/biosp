<?php

namespace App\Http\Requests\Province;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProvinceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to  make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->user()->hasRole('super-admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:125',
                Rule::unique(table: 'provinces', column: 'name')
                    ->ignore(id: $this->province->ulid, idColumn: 'ulid'),
            ],
            'country_ulid' => ['required', 'string', 'ulid'],
        ];
    }
}
