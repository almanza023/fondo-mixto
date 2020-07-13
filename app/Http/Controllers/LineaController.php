<?php

namespace App\Http\Controllers;

use App\Models\Linea;
use App\Http\Requests\LineasRequest;
use Illuminate\Http\Request;

class LineaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $lineas = Linea::all();
        if (request()->ajax()) {
            $lineas = Linea::all();
            /*si los campos estan vacios mostrar mj de error, sino retornar vista. */
            if (count($lineas) == 0) {
                return response()->json(['warning' => 'Error en el servidor']);
            } else {
                return response()->view('ajax.table-lineas', compact('lineas'));
            }
        }
        return view('lineas.index',  compact('lineas'));
    }

    public function store(LineasRequest $request)
    {
        $lineas = new Linea();
        $lineas->nombre_linea = $request->nombre_linea;
        $lineas->descripcion = $request->descripcion;
        $lineas->status = 1;
        $exito = $lineas->save();

        if ($exito) {
            return response()->json(['success' => 'LÍNEA CREADA CON EXITO!']);
        }
    }

    public function update(LineasRequest $request, $id)
    {
        if (request()->ajax()) {
            Linea::findOrFail($request->id_row)->update($request->all());
            return response()->json(['success' => 'LINEA ACTUALIZADA CORRECTAMENTE']);
        }
    }


    public function changeLineas($id)
    {
        $Lineas = Linea::findOrFail($id);

        if ($Lineas->status) {
            $Lineas->update(['status' => 0]);
        } else {
            $Lineas->update(['status' => 1]);
        }
        return response()->json(['success' => 'ESTADO DE LINEAS ACTUALIZADO CON EXITO!']);
    }
}
