<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateClientRequest extends FormRequest
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
            'name' => 'required|min:3|max:160',
            'cpf' => 'min:11',
            'email' => 'email'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nome é obrigatório',
            'name.min' => 'Ops! Precisa informar pelo menos 3 caractéres',
            'name.max' => 'Ops! Atingiu o limite máximo de caractéres',
            'cpf.min' => 'Ops! Preenchimento incorreto, utilize apenas números e no máximo 13 caractéres',
            'email' => 'E-mail é um campo obrigatório',
            'email.email' => 'Dados do e-mail incorretos',
        ];
    }
}
