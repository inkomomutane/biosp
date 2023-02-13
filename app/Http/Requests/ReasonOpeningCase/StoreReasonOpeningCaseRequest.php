<?php

namespace App\Http\Requests\ReasonOpeningCase;

use Illuminate\Foundation\Http\FormRequest;

class StoreReasonOpeningCaseRequest extends FormRequest
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
            'name' => 'required|string|max:125|unique:reason_opening_cases',
        ];
    }
}
