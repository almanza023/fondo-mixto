<?php

namespace App\Http\Controllers;

use App\Http\Requests\TipoDePoblacionRequest;
use App\Models\Clasificacion;
use Illuminate\Http\Request;

class TipoPoblacionController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'recepcion']);
    }
    
    public function index()
    {
        $tipopoblaciones = Clasificacion::all();
        if (request()->ajax()) {
            $tipopoblaciones = Clasificacion::all();
            /*si los campos estan vacios mostrar mj de error, sino retornar vista. */
            if (count($tipopoblaciones) == 0) {
                return response()->json(['warning' => 'Error en el servidor']);
            } else {
                return response()->view('ajax.table-tipodepoblacion', compact('tipopoblaciones'));
            }
        }
        return view('tipopoblacion.index', compact('tipopoblaciones'));
    }

    public function store(TipoDePoblacionRequest $request)
    {
        $tipopoblaciones = new Clasificacion();
        $tipopoblaciones->tipo_poblacion = $request->tipo_poblacion;
        $tipopoblaciones->status = 1;
        $exito = $tipopoblaciones->save();
        if ($exito) {
            return response()->json(['success' => 'TIPO DE POBLACION CREADA CON EXITO']);
        }
    }

    public function update(Request $request, $id)
    {
        if (request()->ajax()) {
            Clasificacion::findOrFail($request->id_row)->update($request->all());
            return response()->json(['success' => 'POBLACION ACTUALIZADA CORRECTAMENTE']);
        }
    }

    public function changeStatus($id)
    {
        $tipopoblacion = Clasificacion::findOrFail($id);

        if ($tipopoblacion->status) {
            $tipopoblacion->update(['status' => 0]);
        } else {
            $tipopoblacion->update(['status' => 1]);
        }
        return response()->json(['success' => 'ESTADO DE TIPO POBLACION ACTUALIZADO CON EXITO!']);
    }
}
