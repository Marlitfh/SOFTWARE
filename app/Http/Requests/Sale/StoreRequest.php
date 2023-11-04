<?php

namespace App\Http\Requests\Sale;

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
            'client_id' => 'required',
            'product_id' => 'required',
            'sale_tax' => 'required',
            'sade_quantity' => 'required',
            'sade_price' => 'required',
            // 'sade_discount' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'client_id.required' => 'Este campo, cliente, es requerido.',

            'product_id.required' => 'Este campo, producto, es requerido.',

            'sale_tax.required' => 'Este campo, impuesto, es requerido.',

            'sade_quantity.required' => 'Este campo, cantidad, es requerido.',

            'sade_price.required' => 'Este campo, precio, es requerido.',

            // 'sade_discount.required' => 'Este campo, descuento, es requerido.',
        ];
    }
}
