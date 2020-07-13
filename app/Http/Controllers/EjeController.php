<?php

namespace App\Http\Controllers;

use App\Http\Requests\EjesRequest;
use App\Models\Eje;
use Illuminate\Http\Request;

class EjeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $ejes = Eje::all();

        if ($request->ajax()) {
            $ejes = Eje::all();

            if (count($ejes) == 0) {
                return response()->json(['warning' => 'Error en el servidor']);
            } else {
                return response()->view('ajax.table-ejes', compact('ejes'));
            }
        }
        return view('ejes.index', compact('ejes'));
    }

    public function store(EjesRequest $request)
    {
        $ejes = new Eje();
        $ejes->nombre_eje = $request->nombre_eje;
        $ejes->nombre_programa = $request->nombre_programa;
        $exito = $ejes->save();

        if ($exito) {
            return response()->json(['success' => 'EJE CREADO CON EXITO!']);
        }

    }

    public function update(EjesRequest $request, $id)
    {
        if (request()->ajax()) {
            Eje::findOrFail($request->id_row)->update($request->all());
            return response()->json(['success' => 'EJE ACTUALIZADO CORRECTAMENTE']);
        }
    }
}
