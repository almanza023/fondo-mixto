<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidatePresupuestoRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'rubro' => 'required|integer',
            'recurso_municipio' => 'required|integer',
            'fondo_mixto' => 'required|integer',
            'ministerio_cultura' => 'required|integer',
            'ingreso_propio' => 'required|integer',
        ];
    }

    public function attributes()
    {
        return [
            'rubro' => 'Rubro',
            'recurso_municipio' => 'Recurso Municipio',
            'fondo_mixto' => 'Fondo Mixto',
            'ministerio_cultura' => 'Ministerio Cultura',
            'ingreso_propio' => 'Ingreso Propio',
        ];
    }
}
