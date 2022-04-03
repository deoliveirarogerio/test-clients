<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProductRequest extends FormRequest
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
            'description' => 'required|min:3|max:160',
            'price' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'description.required' => 'Campo Descrição é obrigatório',
            'description.min' => 'Ops! Precisa informar pelo menos 3 caractéres',
            'description.max' => 'Ops! Precisa informar pelo menos 160n caractéres',
            'price.required' => 'Campo preço é de preenchimento obrigatório'
        ];
    }
}
