<?php

namespace App\Http\Requests\Provenance;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Setting extends FormRequest
{/**
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
          'name' => 'required',Rule::unique('provenances')->ignore($this->name, 'name'),
      ];
  }
}