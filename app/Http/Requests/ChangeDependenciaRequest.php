<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangeDependenciaRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id_change' => 'required|integer',
            'motivo' => 'required|min:3',
            'fecha_salida' => 'required|min:3',
            'dependencia_change_id' => 'required|exists:dependencias,id',
        ];
    }

    public function attributes()
    {
        return [
            'id_change' => 'Empleado',
            'motivo' => 'Motivo',
            'fecha_salida' => 'Fecha Salida',
            'dependencia_change_id' => 'Dependencia',
        ];
    }
}
