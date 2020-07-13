<?php

namespace App\Http\Controllers;

use App\Http\Requests\FuentesRequest;
use App\Models\Fuente;
use Illuminate\Http\Request;

class FuenteVerificacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $fuentes = Fuente::all();

        if ($request->ajax()) {
            $fuentes = Fuente::all();
            if (count($fuentes) == 0) {
                return response()->json(['warning' => 'Error en el servidor']);
            } else {
                return response()->view('ajax.table-fuenteverificacion', compact('fuentes'));
            }
        }
        return view('fuente_verificacion.index', compact('fuentes'));

    }

    public function store(FuentesRequest $request)
    {
        $fuentes = new Fuente();
        $fuentes->fuente_verificacion = $request->fuente_verificacion;

        $exito = $fuentes->save();

        if ($exito) {
            return response()->json(['success' => 'FUENTE VERIFICACION CREADO CON EXITO!']);
        }
    }

    public function update(FuentesRequest $request, $id)
    {
        if (request()->ajax()) {
            Fuente::findOrFail($request->id_row)->update($request->all());
            return response()->json(['success' => 'FUENTE VERIFICACION ACTUALIZADA CORRECTAMENTE']);
        }
    }

}
