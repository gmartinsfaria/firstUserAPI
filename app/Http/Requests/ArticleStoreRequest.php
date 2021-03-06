<?php

namespace App\Http\Requests;


use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ArticleStoreRequest extends FormRequest
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
            'titulo' => 'required|unique:articles|max:50',
            'data' => 'required|date',
            'descricao' => 'required|max:300',
            'user_id' => 'required|integer',
            'categoria_id' => 'required|integer',
            'artigo_imagem' => 'nullable'

        ];
    }


    public function messages() {
        return [
            'titulo.required' => 'titulo obrigatorio',
            'titulo.unique' => 'titulo tem de ser unico',
            'titulo.max' => 'titulo pode ter no maximo 50 caracteres',
            'data.date' => 'tem de utilizar formato data',
            'descricao.required' => 'descricao obrigatória',
            'descricao.max' => 'descricao pode ter no maximo 300 caracteres',
            'user_id.required' => 'necessario associar um user',
            'user_id.integer' => 'chave estrangeira user tem de ser numerica',
            'categoria_id.required' => 'necessario associar uma categoria',
            'categoria_id.integer' => 'chave estrangeira categoria tem de ser numerica',
            'artigo_imagem.image' => 'o ficheiro tem de ser do tipo imagem'
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
