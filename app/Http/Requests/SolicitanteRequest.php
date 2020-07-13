<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SolicitanteRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'persona_id' => 'required|integer|exists:personas,id',
            'razon_social' => 'nullable|min:3',            
            'municipio_id' => 'required|integer|exists:municipios,id',
            'email' => 'required|email',
            'direccion' => 'required|min:3',
            'celular' => 'integer|min:10|nullable',
            'proponente_id' => 'required|integer|exists:proponentes,id',

            'nombre' => 'required|min:3',
            'apellido' => 'required|min:3',
        ];
    }

    public function attributes()
    {
        return [
            'persona_id' => 'Tipo Persona',
            'razon_social' => 'Razon Social',
            'nombre' => 'Nombres',
            'apellido' => 'Apellidos',
            'nid' => 'CC/NIT',
            'municipio_id' => 'Municipio',
            'direccion' => 'Direccion',
            'celular' => 'Celular',
            'email' => 'Email',
            
            'proponente_id' => 'Tipo Proponente',
        ];
    }
}
