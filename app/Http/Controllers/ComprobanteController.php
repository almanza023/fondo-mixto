<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComprobanteRequest;
use App\Models\Anexo;
use App\Models\Comprobante;
use App\Models\Documento;
use App\Models\Solicitud;
use Carbon\Carbon;

use Illuminate\Http\Request;




class ComprobanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comprobantes=Comprobante::where('status', 1)->get();   
        return view('comprobantes.index', compact('comprobantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comprobantes.create');
    }

    public function createComprobante($id)
    {
        $solicitud=Solicitud::find($id);
        return view('comprobantes.create-comprobante', compact('solicitud'));
    }

    public function solicitudes(){
        $solicitudes= Solicitud::getSolicitudes();
        return response()->json($solicitudes);
    }
    
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComprobanteRequest $request)
    {
        
       
        $exito=Comprobante::create($request->all());
        if ($exito) {
            return response()->json(['success' => 'COMPROBANTE  CREADO CON EXITO!']);
        }
        return response()->json(['warning' => 'ERROR AL GUARDAR DATOS']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $c=Comprobante::findOrFail($id);
     
        return view('comprobantes.show', compact('c'));
    }

 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $comprobante=Comprobante::find($id);
      return view('comprobantes.edit', compact('comprobante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ComprobanteRequest $request, $id)
    {
        $com=Comprobante::find($id);
        $com->update($request->all());
        if ($com) {
            return response()->json(['success' => 'COMPROBANTE  ACTUALIZADO CON EXITO!']);
        }
        return response()->json(['warning' => 'ERROR AL ACTUALIZAR DATOS']);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $c=Comprobante::find($id);
        $c->status=0;
        $c->update();
        return redirect()->route('comprobantes.index');
    }

    
}
