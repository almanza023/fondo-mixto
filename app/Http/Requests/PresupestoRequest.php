<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PresupestoRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'rubro' => 'required|integer|min:2',
            'recurso_municipio' => 'required|integer|min:2',
            'fondo_mixto' => 'required|integer|min:2',
            'ministerio_cultura' => 'required|integer|min:2',
            'ingreso_propio' => 'required|integer|min:2',

        ];
    }

    public function attribute()
    {
        return [
            'rubro' => 'Rubro',
            'recurso_municipio' => 'Recursos del municipio',
            'fondo_mixto' => 'Fondo mixto de promoción de la cultura y las artes de sucre',
            'ingreso_propio' => 'Ingresos Propios',
        ];
    }
}
