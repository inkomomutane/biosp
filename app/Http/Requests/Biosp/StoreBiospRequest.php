<?php

namespace App\Http\Requests\Biosp;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBiospRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
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
                Rule::unique(table: 'biosps', column: 'name'),
            ],
            'project_name' => ['string', 'nullable', 'max:125'],
            'neighborhood_ulid' => ['required', 'string', 'ulid'],
        ];
    }
}
