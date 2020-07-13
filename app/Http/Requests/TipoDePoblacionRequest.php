<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TipoDePoblacionRequest extends FormRequest
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
            'tipo_poblacion' => 'required|min:3'
        ];
    }
    public function attributes(){
        return [
            'tipo_poblacion' => 'Tipo de Población'
        ];
    }
}
