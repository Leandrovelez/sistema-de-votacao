<?php

namespace App\Http\Requests\Vote;

use Illuminate\Foundation\Http\FormRequest;

class CreateVoteRequest extends FormRequest
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
            'start_date' => 'required|date_format:d/m/Y H:i',
            'end_date' => 'required|date_format:d/m/Y H:i',
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
            'start_date.required' => 'A data de ínicio não poder ser vazia',
            'start_date.date' => 'A data de ínicio deve conter data e hora',
            'end_date.required' => 'A data de término não pode ser vazia',
            'end_date.date' => 'A data de término deve conter data e hora',
        ];
    }
}
