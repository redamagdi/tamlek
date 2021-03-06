<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FatureRequest extends FormRequest
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
          'nameEn'=>'required',
          'nameAr'=>'required',
      ];
    }
    public function messages()
    {
      return[
        'nameEn.required'=>'English name is required',
        'nameAr.required'=>'Arabic name is required',
      ];
    }
}
