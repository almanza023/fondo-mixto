<?php

namespace App\Http\Controllers;

use App\Models\Comprobante;
use App\Models\Estado;
use App\Models\Indicador;
use App\Models\IndicadorMeta;
use App\Models\IndicadorSolicitud;
use App\Models\Linea;
use App\Models\LineaProyecto;
use App\Models\Poblacion;
use App\Models\Proceso;
use App\Models\Reporte;
use App\Models\Solicitud;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use NumerosEnLetras;
class ReporteProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estados = Estado::all(['id','nombre_estado']);
        $poblaciones = Poblacion::all(['id', 'detalle']);
        $lineas = Linea::all(['id', 'descripcion']);
        $indicadores=Indicador::all(['id', 'nombre_indicador']);
        return view('reportes.reporteproyecto', compact('lineas', 'poblaciones', 'estados', 'indicadores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function linea(Request $request)
    {
        
        $date = Carbon::now()->format('d-m-Y');
        $linea=$request->linea;
        $estado=$request->estado;
        $solicitudes=Reporte::getLinea($linea);
        $pdf = PDF::loadview('pdf.lineas', compact('solicitudes', 'date'))
        ->setPaper('letter', 'landscape');
        return $pdf->stream('Proyecto Líneas.pdf');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function fechas(Request $request)
    {
        $fecha1=$request->fecha1;
        $fecha2=$request->fecha2;
        $date = Carbon::now()->format('d-m-Y');
        if(!empty($fecha1) || !empty($fecha2)){
            $solicitudes=Reporte::getFechas($fecha1, $fecha2);       
            $pdf = PDF::loadview('pdf.fechas', compact('solicitudes', 'fecha1', 'fecha2', 'date'))
             ->setPaper('letter', 'landscape');
            return $pdf->stream('Proyectos por Fechas.pdf');
        }
    }


    public function fechasIndicador(Request $request)
    {
        $date1 = $request->date1;
        $date2 = $request->date2;
        $indicador_id = $request->indicador_id;
        $year = Carbon::parse($request->date2)->year;
        $year1 = Carbon::parse($request->date1)->year;
        if($year==$year1){
            $indicadores=IndicadorSolicitud::where('indicador_id', $indicador_id)->get();    
            
            $pdf = PDF::loadview('pdf.indicador-fechas', compact('indicadores' ,'date1', 'date2', 'year'))
            ->setPaper('letter', 'landscape');
            return $pdf->stream('Indicador por Fecha.pdf');
        }
    }

    public function comprobante($id)
    {
        $c=Comprobante::find($id);
        $letra=strtoupper(NumerosEnLetras::convertir($c->total).' PESOS');
        $pdf = PDF::loadview('pdf.comprobantes', compact('c', 'letra'));
        
        return $pdf->stream('Comprobante Egreso.pdf');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function proyectos()
    {
        return view('reportes.proyecto');
    }

    public function filter(Request $request){
                      
            $date1 = $request->date1;
            $date2 = $request->date2;
            $year = Carbon::parse($request->date2)->year;
            $year1 = Carbon::parse($request->date1)->year;
            if($year==$year1){
                $indicadores=IndicadorMeta::where('year', $year)->get();           
                $pdf = PDF::loadview('pdf.indicador', compact('indicadores' ,'date1', 'date2', 'year'))
                ->setPaper('letter', 'landscape');
                return $pdf->stream('Indicadores por Fechas.pdf');
            }
            
            

      
    }

    
}
