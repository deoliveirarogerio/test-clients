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
        $id =$this->segment(2);
        return [
            'name' => 'required|string|min:3',
            'cpf' => "required|min:11|unique:clients,cpf,{$id},id",
            'email' => "sometimes|required|email|unique:clients,email,{$id},id"
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nome é obrigatório',
            'name.min' => 'Ops! Precisa informar pelo menos 3 caractéres',
            'cpf.required' => 'Campo CPF é de preenchimento obrigatório',
            'cpf.min' => 'Ops! Preenchimento incorreto, utilize apenas números e no máximo 13 caractéres',
            'cpf.unique' => 'CPF já cadastrado no sistema, por favor verifique os dados',
            'email.required' => 'E-mail é um campo obrigatório',
            'email.unique' => 'E-mail já cadastrado no sistema, por favor tente outro',
            'email.email' => 'Dados do e-mail incorretos',
        ];
    }
}
