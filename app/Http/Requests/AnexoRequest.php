<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnexoRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [            
            'documento_id' => 'required|integer',
            'archivo' => 'required|file|mimes:pdf',
        ];
    }

    
    public function attributes()
    {
        return [
            'documento_id' => 'Documento',
            'archivo' => 'Archivo',            
        ];
    }
}
