<?php

namespace App\Http\Requests\Option;

use Illuminate\Foundation\Http\FormRequest;

class CreateOptionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'vote_id' => 'required|integer|exists:votes,id',
            'content' => 'required|string'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages() {
        return [
            'vote_id.required' => 'O id da votação não pode ser vazio',
            'vote_id.integer' => 'O id da votação deve ser um número inteiro',
            'vote_id.exists' => 'Votação não encontrada',
            'content.required' => 'O conteúdo não pode ser vazio',
            'content.string' => 'O conteúdo deve ser um texto',
        ];
    }
}
