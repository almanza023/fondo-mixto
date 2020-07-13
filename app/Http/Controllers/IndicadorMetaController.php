<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndicadorMetaRequest;
use App\Http\Requests\IndicadorRequest;
use App\Models\Eje;
use App\Models\Indicador;
use App\Models\IndicadorMeta;
use App\Models\IndicadorSolicitud;
use Illuminate\Http\Request;

class IndicadorMetaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $indicadores = Indicador::all();
        $ejes = Eje::all();

        if (request()->ajax()) {
            $indicadores = Indicador::all();
            /*si los campos estan vacios mostrar mj de error, sino retornar vista. */
            if (count($indicadores) == 0) {
                return response()->json(['warning' => 'Error en el servidor']);
            } else {
                return response()->view('ajax.table-indicadores', compact('indicadores'));
            }
        }
        return view('indicador.index', compact('indicadores', 'ejes'));
    }

    public function store(IndicadorMetaRequest $request)
    {
        if (request()->ajax()) {          
            $meta=IndicadorMeta::where('indicador_id', $request->indicador_id)
            ->where('year', $request->year)->count();
            if($meta>0){
                return response()->json(['warning' => 'YA EXISTEN META ANUAL PARA EL AÑO SELECCIONADO']);
            }
            $exito = IndicadorMeta::create($request->all());
            if ($exito) {
                return response()->json(['success' => 'META ANUAL DE INDICADOR AGREGADO CON EXITO!']);
            } else {
                return response()->json(['warning' => 'ERROR AL GUARDAR DATOS!']);
            }

        }
    }

    public function update(IndicadorRequest $request, $id)
    {
        if (request()->ajax()) {
            Indicador::findOrFail($request->id_row)->update($request->all());
            return response()->json(['success' => 'INDICADOR ACTUALIZADO CORRECTAMENTE']);
        }
    }

    public function changeStatus($id)
    {
        $indicador = Indicador::findOrFail($id);

        if ($indicador->status) {
            $indicador->update(['status' => 0]);
        } else {
            $indicador->update(['status' => 1]);
        }
        return response()->json(['success' => 'ESTADO DE INDICADOR ACTUALIZADO CON EXITO!']);
    }

    public function indicadorSolicitud(Request $request)
    {
        $indicador=IndicadorSolicitud::where('solicitud_id', $request->solicitud_id)
        ->where('indicador_id', $request->indicador_id)->get(); 
        if($indicador->count()>0){
            return response()->json(['warning' => 'EL INDICADOR SELECCIONADO YA FUE AGREGADO A LA SOLICITUD']);
        }
        IndicadorSolicitud::create($request->all());     
        return response()->json(['success' => 'INDICADOR AGREADO CON EXITO']);
    }

   

}
