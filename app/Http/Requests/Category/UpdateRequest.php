<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
            // 'cate_name' => 'required|string|max:50|unique:categories->ignore($this->id)',
            'cate_description' => 'nullable|string|max:250',
            'cate_name' => [
                'required',
                'string',
                'max:50',
                Rule::unique('categories')->ignore( $this->route('category')->id )
            ],
        ];
    }

    public function messages()
    {
        return [
            'cate_name.required' => 'NOMBRE, Este campo es requerido.',
            'cate_name.string' => 'NOMBRE, Este valor no es correcto.',
            'cate_name.max' => 'NOMBRE, Solo se permite 50 caracteres.',
            'cate_name.unique' => 'Categoría ya registrada.',

            'cate_description.string' => 'DESCRIPCIÓN, Este valor no es correcto.',
            'cate_description.max' => 'DESCRIPCIÓN, Solo se permite 250 caracteres.',
        ];
    }
}
