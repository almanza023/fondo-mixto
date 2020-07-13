<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentoRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
           'tipo_documento'=> 'required|min:3',
           'categoria' => 'required',
        ];
    }
    public function attributes(){
        return [
            'tipo_documento' => 'Nombre del Documento',
            'categoria' => 'Requisito',
        ];
    }
}
