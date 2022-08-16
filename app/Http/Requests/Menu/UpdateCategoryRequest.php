<?php

namespace App\Http\Requests\Menu;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'name' => 'required|max:255',
            'parent_id' => 'required',
            'description' => 'required',
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'A name is bat buoc ',
            'name.max' => 'A name is max 255 charator',
            'parent_id.required' => 'A parent_id is required',
            'description.required' => 'A description is required',
            'content.required' => 'A content is required',
        ];
    }
}
