<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserUpdateRequest extends FormRequest
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
            'email' => 'nullable|unique:users|email',
            'name' => 'nullable||unique:users|max:20',
            'password' => 'nullable|min:6',
            'profile_image' => 'nullable|image'
        ];
    }

    public function messages() {
        return [
            'email.unique' => 'já existe um utilizador registado com este email',
            'email.email' => 'campo email preenchido incorretamente',
            'name.unique' => 'já existe um utilizador registado com este name',
            'name.max' => 'nome pode ter no maximo 20 caracteres',
            'password.min' => 'password precisa no mínimo de 6 caracteres',
            'profile_image.image' => 'o ficheiro tem de ser do tipo imagem'
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
                    'msg' => 'Erro de update'
                ], 422));
    }
}
