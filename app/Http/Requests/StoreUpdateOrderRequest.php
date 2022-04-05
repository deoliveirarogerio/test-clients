<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use phpDocumentor\Reflection\Types\Nullable;

class StoreUpdateOrderRequest extends FormRequest
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
            'order_number' => 'required',
            'purchase_date' => 'required',
            'amount' =>'required',
            'status' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'client_id.required' => 'Campo Cliente é de preenchimento obrigatório',
            'product_id.required' => 'Campo Produto é de preenchimento obrigatório',
            'order_number.required' => 'Campo Número do Pedido é de preenchimento obrigatório',
            'purchase_date.required' => 'Campo Data do Pedido é de preenchimento obrigatório',
            'amount.required' => 'Campo Quantidade do Produto é de preenchimento obrigatório',
        ];
    }
}
