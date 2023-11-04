<?php

namespace App\Http\Requests\Client;

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
            'clie_name' => 'required|string|max:255',
            // 'clie_dni' => 'required|string|min:8|max:8|unique:clients',
            // 'clie_ruc' => 'nullable|string|min:11|max:11|unique:clients',
            'clie_address' => 'nullable|string|max:255',
            // 'clie_phone' => 'nullable|string|min:9|max:9|unique:clients',
            // 'clie_email' => 'nullable|string|max:255|unique:clients|email:rfc,dns',

            'clie_dni' => [
                'required',
                'string',
                'min:8',
                'max:8',
                Rule::unique('clients')->ignore($this->route('client')->id)
            ],

            'clie_ruc' => [
                'nullable',
                'string',
                'min:11',
                'max:11',
                Rule::unique('clients')->ignore($this->route('client')->id)
            ],

            'clie_phone' => [
                'nullable',
                'string',
                'min:9',
                'max:9',
                Rule::unique('clients')->ignore($this->route('client')->id)
            ],

            'clie_email' => [
                'nullable',
                'string',
                'max:255',
                // 'email:rfc,dns',
                'email:rfc',
                Rule::unique('clients')->ignore($this->route('client')->id)
            ],

        ];
    }

    public function messages()
    {
        return [
            'clie_name.required' => 'Este campo es requerido, en NOMBRE.',
            'clie_name.string' => 'Este valor no es correcto, en NOMBRE.',
            'clie_name.max' => 'Solo se permite 255 caracteres, en NOMBRE.',

            'clie_dni.required' => 'Este campo es requerido, en DNI.',
            'clie_dni.string' => 'Este valor no es correcto, en DNI.',
            'clie_dni.min' => 'Se requiere 8 caracteres, en DNI.',
            'clie_dni.max' => 'Solo se permite 8 caracteres, en DNI.',
            'clie_dni.unique' => 'DNI ya registrado.',

            'clie_ruc.string' => 'Este valor no es correcto, en RUC.',
            'clie_ruc.min' => 'Se requiere 11 caracteres, en RUC.',
            'clie_ruc.max' => 'Solo se permite 11 caracteres, en RUC.',
            'clie_ruc.unique' => 'RUC ya registrado.',

            'clie_address.required' => 'Este campo es requerido, en DIRECCIÓN.',
            'clie_address.string' => 'Este valor no es correcto, en DIRECCIÓN.',
            'clie_address.max' => 'Solo se permite 255 caracteres, en DIRECCIÓN.',

            'clie_phone.string' => 'Este valor no es correcto, en CELULAR.',
            'clie_phone.min' => 'Se requiere 9 caracteres, en CELULAR.',
            'clie_phone.max' => 'Solo se permite 9 caracteres, en CELULAR.',
            'clie_phone.unique' => 'Celular ya registrado.',

            'clie_email.string' => 'Este valor no es correcto, en EMAIL.',
            'clie_email.max' => 'Solo se permite 255 caracteres, en EMAIL.',
            'clie_email.unique' => 'Email ya registrado.',
            'clie_email.email' => 'Email no válido.',
        ];
    }
}
