<?php

namespace App\Http\Controllers;

use App\Http\Requests\SolicitanteRequest;
use App\Models\Departamento;
use App\Models\Persona;
use App\Models\Proponente;
use App\Models\Solicitante;
use Illuminate\Http\Request;

class SolicitanteController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'recepcion']);       

    }
    
    public function index(Request $request)
    {
        $solicitantes = Solicitante::with('municipio.departamento')->get();
        $personas = Persona::all(['id', 'tipo_persona']);
        $departamentos = Departamento::all(['id', 'nombre_departamento']);
        $proponentes = Proponente::all(['id', 'nombre_proponente']);

        if (request()->ajax()) {
            $solicitantes = Solicitante::all();
            /*si los campos estan vacios mostrar mj de error, sino retornar vista. */
            if (count($solicitantes) == 0) {
                return response()->json(['warning' => 'Error en el servidor']);
            } else {
                return response()->view('ajax.table-solicitantes', compact('solicitantes', 'personas', 'departamentos', 'proponentes'));
            }
        }
        return view('solicitante.index', compact('solicitantes', 'personas', 'departamentos', 'proponentes'));
    }

    public function store(SolicitanteRequest $request)
    {

        if (request()->ajax()) {
            $solicitante = new Solicitante();
            $solicitante->municipio_id=$request->municipio_id;
            $solicitante->persona_id=$request->persona_id;
            $solicitante->proponente_id=$request->proponente_id;
            $solicitante->nid=$request->nid;
            $solicitante->nombre=$request->nombre;
            $solicitante->apellido=$request->apellido;
            $solicitante->razon_social=$request->razon_social;
            $solicitante->email=$request->email;
            $solicitante->celular=$request->celular;
            $solicitante->direccion=$request->direccion;
            $solicitante->representante_legal=strtoupper($request->nombre.' '.$request->apellido);
            $solicitante->save();

            if ($solicitante) {
                return response()->json(['success' => 'SOLICITANTE CREADO CON EXITO!']);
            }
        }
    }

    public function update(SolicitanteRequest $request, $id)
    {
        if (request()->ajax()) {
            $solicitante=Solicitante::findOrFail($request->id_row);
            $solicitante->municipio_id=$request->municipio_id;
            $solicitante->persona_id=$request->persona_id;
            $solicitante->proponente_id=$request->proponente_id;
            $solicitante->nid=$request->nid;
            $solicitante->nombre=$request->nombre;
            $solicitante->apellido=$request->apellido;
            $solicitante->razon_social=$request->razon_social;
            $solicitante->email=$request->email;
            $solicitante->celular=$request->celular;
            $solicitante->direccion=$request->direccion;
            $solicitante->representante_legal=strtoupper($request->nombre.' '.$request->apellido);
            $solicitante->save();
            return response()->json(['success' => 'SOLICITANTE ACTUALIZADO CORRECTAMENTE']);

        }
    }
}
