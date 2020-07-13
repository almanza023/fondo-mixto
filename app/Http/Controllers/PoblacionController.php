<?php

namespace App\Http\Controllers;
use App\Models\Poblacion;
use App\Models\Clasificacion;
use App\Http\Requests\PoblacionRequest;
use Illuminate\Http\Request;

class PoblacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $clasificaciones = Clasificacion::all(['id','tipo_poblacion']);
        $poblaciones = Poblacion::with('clasificacion')->get();
        if (request()->ajax()) {
            $poblaciones = Poblacion::all();
            /*si los campos estan vacios mostrar mj de error, sino retornar vista. */
            if (count($poblaciones) == 0) {
                return response()->json(['warning' => 'Error en el servidor']);
            } else {
                return response()->view('ajax.table-poblacion', compact('poblaciones'));
            }
        }
                return view('poblacion.index', compact('poblaciones', 'clasificaciones'));
    }

    public function store(PoblacionRequest $request)
    {
        $poblaciones = new Poblacion();
        $poblaciones->clasificacion_id  = $request->clasificacion_id;
        $poblaciones->detalle = $request->detalle;
        $exito= $poblaciones->save();
        if ($exito) {
           return response()->json(['success' =>'POBLACION CREADA CORRECTAMENTE' ]);
        }
    }

    public function update(PoblacionRequest $request, $id)
    {
        if (request()->ajax()) {
            Poblacion::findOrFail($request->id_row)->update($request->all());
            return response()->json(['success' => 'POBLACION ACTUALIZADA CORRECTAMENTE']);
        }
    }
}

