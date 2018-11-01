<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserStoreRequest extends FormRequest
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
            'email' => 'required|unique:users|email',
            'name' => 'required||unique:users|max:20',
            'password' => 'required|min:6'
        ];
    }

    public function messages() {
        return [
            'email.required' => 'campo email obrigatorio',
            'email.unique' => 'já existe um utilizador registado com este email',
            'email.email' => 'campo email preenchido incorretamente',
            'name.required' => 'nome obrigatorio',
            'name.unique' => 'já existe um utilizador registado com este name',
            'name.max' => 'nome pode ter no maximo 20 caracteres',
            'password.required' => 'password obrigatoria',
            'password.min' => 'password precisa no mínimo de 6 caracteres'

        ];
    }

    protected function failedValidation(Validator $validator)
    {
        //controlar o que acontece depois de dar um erro de validação
        throw new HttpResponseException(
            response()->json(
                [
                    'status' => 422,
                    'data' => $validator->errors(),
                    'msg' => 'Erro de validacao'
                ], 422));
    }
}
