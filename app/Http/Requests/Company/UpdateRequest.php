<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

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
            'comp_name' => 'required|string|max:255',
            'comp_description' => 'required|string|max:255',
            // 'comp_logo'  => 'required',
            'comp_email' => 'required|string|max:255|email:rfc',
            'comp_address' => 'required|string|max:255',
            'comp_ruc' => 'required|string|min:11|max:11',
        ];
    }

    public function messages()
    {
        return [
            'comp_name.required' => 'NOMBRE, Este campo es requerido.',
            'comp_name.string' => 'NOMBRE, Este valor no es correcto.',
            'comp_name.max' => 'NOMBRE, Solo se permite 50 caracteres.',

            'comp_description.required' => 'DESCRIPCIÓN, Este valor es requerido.',
            'comp_description.string' => 'DESCRIPCIÓN, Este valor no es correcto.',
            'comp_description.max' => 'DESCRIPCIÓN, Solo se permite 255 caracteres.',

            // 'comp_logo.required' => 'IMAGEN - LOGO, Este valor es requerido.',

            'comp_email.required' => 'Este valor es requerido, en EMAIL.',
            'comp_email.string' => 'Este valor no es correcto, en EMAIL.',
            'comp_email.max' => 'Solo se permite 255 caracteres, en EMAIL.',

            'comp_ruc.required' => 'Este valor es requerido, en RUC.',
            'comp_ruc.string' => 'Este valor no es correcto, en RUC.',
            'comp_ruc.min' => 'Se requiere 11 caracteres, en RUC.',
            'comp_ruc.max' => 'Solo se permite 11 caracteres, en RUC.',
        ];
    }
}
