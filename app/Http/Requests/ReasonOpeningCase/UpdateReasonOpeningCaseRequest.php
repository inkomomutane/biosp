<?php

namespace App\Http\Requests\ReasonOpeningCase;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateReasonOpeningCaseRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                'max:125',
                Rule::unique(table: 'reason_opening_cases', column: 'name')
                    ->ignore(id: $this->reason_opening_case->ulid, idColumn: 'ulid'),
            ],
        ];
    }
}
