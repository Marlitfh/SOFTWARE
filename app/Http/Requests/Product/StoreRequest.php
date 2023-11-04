<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'prod_code' => 'nullable|string|max:13',

            'prod_name' => 'required|string|max:255|unique:products',

            'prod_price' => 'required',

            'category_id' => 'integer|required|exists:App\Category,id',
        ];
    }

    public function messages()
    {
        return [
            'prod_code.string' => 'CÓDIGO BARRA, El valor no es correcto.',
            'prod_code.max' => 'CÓDIGO BARRA, Solo se permiten 13 caracteres.',

            'prod_name.required' => 'NOMBRE, El campo es requerido.',
            'prod_name.string' => 'NOMBRE, El valor no es correcto.',
            'prod_name.max' => 'NOMBRE, Solo se permiten 255 caracteres.',
            'prod_name.unique' => 'Producto ya registrado.',

            'prod_price.required' => 'El campo PRECIO, es requerido.',

            'category_id.integer' => 'CATEGORÍA, Solo se aceptan valores enteros.',
            'category_id.required' => 'El campo categoría, es requerido.',
            'category_id.exists' => 'La Categoría no existe.',
        ];
    }

}
