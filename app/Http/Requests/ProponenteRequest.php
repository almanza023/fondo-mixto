<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProponenteRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
          'nombre_proponente' =>'required|min:3'
        ];
    }

    public function attributes()
    {
        return [
            'nombre_proponente'=> 'Nombre del Proponente'
        ];
    }
}
