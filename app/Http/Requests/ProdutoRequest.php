<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
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
            'nome' => [
                'required', 'min:3', 'max:255'
            ],
            'preco' => [
                'required', 'numeric'
            ],
            'descricao' => [
                'required', 'string', 'min:5'
            ],
            'quantidade' => [
                'required', 'numeric'
            ],
            'imagem' => [],
            
            'categoria_id' => [
                'required', 'numeric'
            ]
        ];
    }
}