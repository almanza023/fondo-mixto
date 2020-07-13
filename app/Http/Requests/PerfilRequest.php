<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PerfilRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'min:6',            
        ];
    }

    public function attributes()
    {
        return [
            'password' => 'Nueva Contraseña',
            'password_confirmation' => 'Confirmar Contraseña',
            
        ];
    }
}
