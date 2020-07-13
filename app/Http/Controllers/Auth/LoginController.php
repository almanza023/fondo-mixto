<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm(){
        return view('auth.login');
    }

    public function login(Request $request){
        
        $this->validateLogin($request);      
 
         if (Auth::attempt(['documento' => $request->documento, 'password' => $request->password])){
             $emp=Empleado::find(auth()->user()->empleado_id);
             $nom=$emp->nombre. ' '.$emp->apellido;
             return response()->json(['success'=>$nom ]);
         }
         return response()->json(['warning'=>'Error al iniciar sesión. Intente Nuevamente']);


         
     }

     protected function validateLogin(Request $request){
        $this->validate($request,[
            'documento' => 'required|integer|min:6',
            'password' => 'required|string'
        ]);

    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/');
    }

}
