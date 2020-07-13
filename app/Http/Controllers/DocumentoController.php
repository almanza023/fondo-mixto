<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentoRequest;
use App\Models\Documento;
use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $documentos = Documento::all();
        if (request()->ajax()) {
            $documentos = Documento::all();
            /*si los campos estan vacios mostrar mj de error, sino retornar vista. */
            if (count($documentos) == 0) {
                return response()->json(['warning' => 'Error en el servidor']);
            } else {
                return response()->view('ajax.table-documentos', compact('documentos'));
            }
        }
        return view('documentos.index', compact('documentos'));
    }

    public function store(DocumentoRequest $request)
    {
        if (request()->ajax()) {
            Documento::create($request->all());
            return response()->json(['success' => 'DOCUMENTO GUARDADO CORRECTAMENTE']);
        }
    }

    public function update(DocumentoRequest $request, $id)
    {
        if (request()->ajax()) {
            Documento::findOrFail($request->id_row)->update($request->all());
            return response()->json(['success' => 'DOCUMENTO ACTUALIZADO CORRECTAMENTE']);

        }
    }

}
