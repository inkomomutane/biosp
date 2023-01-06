<?php

namespace App\Http\Requests\Biosp;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBiospRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize():bool
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
            'name' => [
                'required',
                'string',
                'max:125',
                Rule::unique(table: 'biosps', column: 'name')
                    ->ignore(id: $this->biosp->uuid, idColumn: 'uuid'),
            ],
            'project_name' => ['string','nullable','max:125'],
            'neighborhood_uuid' => ['required', 'string', 'uuid'],
        ];
    }
}
