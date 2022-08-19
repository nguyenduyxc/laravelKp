<?php

namespace App\Http\Requests\Slider;

use Illuminate\Foundation\Http\FormRequest;

class CreateSliderRequest extends FormRequest
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
            'name'=>'required',
            'thumb'=>'required',
            'sort_by'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'A name is required',
            'thumb.required' => 'A message is required',
            'sort_by.required' => 'A sort_by is required',
        ];
    }

}
