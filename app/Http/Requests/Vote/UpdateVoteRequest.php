<?php

namespace App\Http\Requests\Vote;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVoteRequest extends FormRequest
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
            'title' => 'required|string',
            'question' => 'required|string',
            'start_date' => 'required',
            'end_date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages() {
        return [
            'title.required' => 'O título não pode ser vazio',
            'title.string' => 'O título deve ser um texto',
            'question.required' => 'A pergunta não pode ser vazia',
            'question.string' => 'A pergunta deve ser um texto',
            'start_date.required' => 'A data de ínicio não poder ser vazia',
            'end_date.required' => 'A data de término não pode ser vazia',
            'start_time.required' => 'A hora de ínicio não poder ser vazia',
            'end_time.required' => 'A hora de término não pode ser vazia',
        ];
    }
}
