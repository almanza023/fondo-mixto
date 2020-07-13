<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProyectoRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            
            'fecha_ini' => 'required|date',
            'fecha_fin' => 'required|after_or_equal:fecha_ini',          
            'id_linea' => 'required',
            'id_linea.*' => 'required',            
        ];
    }

    public function attributes()
    {
        return [
           
            'fecha_ini' => 'Fecha Inicio',
            'fecha_fin' => 'Fecha Final',            
            'id_linea' => 'Lineas',
            
        ];

    }
}
