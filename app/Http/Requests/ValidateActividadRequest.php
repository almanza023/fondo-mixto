<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateActividadRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre_actividad' => 'required|min:3',
            'fecha_inicio' => 'required|date',
            'fecha_final' => 'required|after_or_equal:fecha_inicio',
        ];
    }

    
    public function attributes()
    {
        return [
            'nombre_actividad' => 'Actividad',
            'fecha_inicio' => 'Fecha Inicio',
            'fecha_final' => 'Fecha Final',
        ];
    }

}
