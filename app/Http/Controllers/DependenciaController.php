<?php

namespace App\Http\Controllers;

use App\Models\Dependencia;
use Illuminate\Http\Request;
use App\Http\Requests\DependenciasRequest;

class DependenciaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
            $dependencias = Dependencia::all();

        if ($request->ajax()) {
            $dependencias = Dependencia::all();
            /*si los campos estan vacios mostrar mj de error, sino retornar vista. */
            if (count($dependencias) == 0) {
                return response()->json(['warning' => 'Error en el servidor']);
            } else {
                return response()->view('ajax.table-dependencias', compact('dependencias'));
            }
        }
        return view('dependencias.index', compact('dependencias'));
    }


    public function store(DependenciasRequest $request)
    {
            $dependencias = new Dependencia();
            $dependencias->nombre_dependencia = $request->get('nombre_dependencia');
            $dependencias->descripcion = $request->get('descripcion');
            $exito = $dependencias->save();

            if ($exito) {
                return response()->json(['success' => 'DEPENDENCIA CREADA CON EXITO!']);
            }
    }


    public function update(DependenciasRequest $request, $id)
    {
        if (request()->ajax()) {
            Dependencia::findOrFail($request->id_row)->update($request->all());
            return response()->json(['success' => 'DEPENDENCIA ACTUALIZADA CORRECTAMENTE']);
        }
    }
}
