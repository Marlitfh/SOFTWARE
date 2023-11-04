<?php

namespace App\Http\Requests\Provider;

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
            // 'prov_name' => 'required|string|max:255|unique:providers',
            'prov_name' => 'required|string|max:255',
            // 'prov_email' => 'required|string|max:200|email:rfc,dns|unique:providers',
            // 'prov_ruc' => 'required|string|max:11|min:11|unique:providers',
            'prov_address' => 'nullable|string|max:255',
            // 'prov_phone' => 'required|string|max:9|min:9|unique:providers',

            'prov_email' => [
                'required',
                'string',
                'max:200',
                // 'email:rfc,dns',
                'email:rfc',
                Rule::unique('providers')->ignore($this->route('provider')->id)
            ],

            'prov_ruc' => [
                'required',
                'string',
                'max:11',
                'min:11',
                Rule::unique('providers')->ignore($this->route('provider')->id)
            ],

            'prov_phone' => [
                'required',
                'string',
                'max:9',
                'min:9',
                Rule::unique('providers')->ignore($this->route('provider')->id)
            ],

        ];
    }

    public function messages()
    {
        return [
            'prov_name.required' => 'NAME, Este campo es requerido.',
            'prov_name.string' => 'NAME, El valor no es correcto.',
            'prov_name.max' => 'NAME, Solo se permitan 255 caracteres.',
            // 'prov_name.unique' => 'NAME, El proveedor se encuentra registrado.',

            'prov_email.required' => 'EMAIL, Este campo es requerido.',
            'prov_email.email' => 'EMAIL, No es un email válido.',
            'prov_email.string' => 'EMAIL, El valor no es correcto.',
            'prov_email.max' => 'EMAIL, Solo se permitan 200 caracteres.',
            'prov_email.unique' => 'Email ya registrado.',

            'prov_ruc.required' => 'RUC, Este campo es requerido.',
            'prov_ruc.string' => 'RUC, El valor no es correcto.',
            'prov_ruc.max' => 'RUC, Solo se permitan 11 caracteres.',
            'prov_ruc.min' => 'RUC, Se requiere 11 caracteres.',
            'prov_ruc.unique' => 'RUC ya registrado.',

            'prov_address.string' => 'DIRECCIÓN, El valor no es correcto.',
            'prov_address.max' => 'DIRECCIÓN, Solo se permitan 255 caracteres.',

            'prov_phone.required' => 'CELULAR, Este campo es requerido.',
            'prov_phone.string' => 'CELULAR, El valor no es correcto.',
            'prov_phone.max' => 'CELULAR, Solo se permitan 9 caracteres.',
            'prov_phone.min' => 'CELULAR, Se requiere 9 caracteres.',
            'prov_phone.unique' => 'Celular ya registrado.',
        ];
    }
}
