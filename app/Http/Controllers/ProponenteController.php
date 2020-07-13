<?php

namespace App\Http\Controllers;

use App\Models\Proponente;
use App\Http\Requests\ProponenteRequest;
use Illuminate\Http\Request;

class ProponenteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $proponentes = Proponente::all();

        if (request()->ajax()) {
            $proponentes = Proponente::all();
            /*si los campos estan vacios mostrar mj de error, sino retornar vista. */
            if (count($proponentes) == 0) {
                return response()->json(['warning' => 'Error en el servidor']);
            } else {
                return response()->view('ajax.table-proponente', compact('proponentes'));
            }
        }
        return view('proponente.index', compact('proponentes'));
    }


    public function store(ProponenteRequest $request)
    {
        if (request()->ajax()) {
            $proponentes = Proponente::create($request->all());
            if ($proponentes) {
                return response()->json(['success' => 'PROPONENTE CREADO CON EXITO!']);
            }
        }
    }

    public function update(ProponenteRequest $request, $id)
    {
        if (request()->ajax()) {
            Proponente::findOrFail($request->id_row)->update($request->all());
            return response()->json(['success' => 'PROPONENTE ACTUALIZADO CORRECTAMENTE']);
        }
    }
}
