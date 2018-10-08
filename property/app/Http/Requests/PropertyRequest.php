<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
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
            'type'=>'required',
            'headerEn'=>'required',
            'headerAr'=>'required',
            'labelEn'=>'required',
            'labelAr'=>'required',
            'descEn'=>'required',
            'descAr'=>'required',
            'cost'=>'required',
            'area'=>'required',
            'reference'=>'required',
            'room'=>'required',
            'bathroom'=>'required',
            'region'=>'required',
            'map'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'type.required'=>'Select property type',
            'headerEn.required'=>'Enter english headr',
            'headerAr.required'=>'Enter arabic header',
            'labelEn.required'=>'Enter english label',
            'labelAr.required'=>'Enter arabic label',
            'descEn.required'=>'Enter english description',
            'descAr.required'=>'Enter arabic description',
            'cost.required'=>'Enter cost',
            'area.required'=>'Enter area',
            'reference.required'=>'Enter refernce',
            'room.required'=>'Enter number of rooms',
            'bathroom.required'=>'Enter number of bathroom',
            'region.required'=>'Select region',
            'map.required'=>'Enter map',
        ];
    }
}
