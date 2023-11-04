<?php

namespace App\Http\Requests\Purchase;

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
            'provider_id' => 'required',
            'product_id' => 'required',
            'purc_tax' => 'required',
            'pude_quantity' => 'required',
            'pude_price' => 'required',
            'purc_total' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'provider_id.required' => 'Este campo Proveedor, es requerido.',

            'product_id.required' => 'Este campo Producto, es requerido.',

            'purc_tax.required' => 'Este campo Impuesto, es requerido.',

            'pude_quantity.required' => 'Este campo Cantidad, es requerido.',

            'pude_price.required' => 'Este campo Precio, es requerido.',

            'purc_total.required' => 'Este campo Total, es requerido.',
        ];
    }
}
