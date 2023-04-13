<?php

namespace App\Http\Requests\PurposeOfVisits;

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
          'name' => 'required',Rule::unique('purpose_of_visits')->ignore($this->name, 'name'),
      ];
  }
}