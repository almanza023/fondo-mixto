<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnexoRequest;
use App\Models\Anexo;
use App\Models\Documento;
use App\Models\Solicitud;
use Carbon\Carbon;

use Illuminate\Http\Request;

use File;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Block\Element\Document;

class AnexoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anexos=Anexo::getAll();
        return view('anexos.index', compact('anexos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $documentos=Documento::all();   
        return view('anexos.create', compact('documentos'));
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
    public function store(AnexoRequest $request)
    {
        

        $obj=Anexo::where('documento_id', $request->documento_id)
        ->where('solicitud_id', $request->solicitud_id)->get();
        $num=count($obj);
        if($num ==0){
        $path= public_path() . '/documentos/solicitudes/'. $request->solicitud_id;
        $carpeta = File::makeDirectory($path, $mode = 0777, true, true);        
        $anexo= new Anexo();
        $anexo->documento_id=$request->documento_id;
        $anexo->solicitud_id=$request->solicitud_id;
        $anexo->status=1;
        $anexo->date=Carbon::now()->format('Y-m-d');
        if ($request->file('archivo')) {
            $doc=Documento::find($request->documento_id);            $file = $request->file('archivo');
            $name = $doc->tipo_documento.'.'. $file->getClientOriginalExtension();
            $file->move($path, $name);
            $anexo->name = $name;         
            $anexo->save();
            
        }
        return response()->json(['success' => 'DOCUMENTO CARGADO EXITOSAMENTE']);
        }else {
            return response()->json(['warning' => 'ESTE DOCUMENTO YA FUE CARGADO']);
        }
        
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $anexos=Anexo::getId($id);       
        return view('anexos.show', compact('anexos'));
    }

 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anexo=Anexo::find($id);       
        return view('anexos.edit', compact('anexo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $obj=Anexo::where('documento_id', $request->documento_id)
        ->where('solicitud_id', $request->solicitud_id)->get();
        $num=count($obj);
        if($num>0){
        $path= public_path() . '/documentos/solicitudes/'. $request->solicitud_id;             
        $anexo=Anexo::find($id);
        if(File::exists($path.'/'.$anexo->name)){
            File::delete($path.'/'.$anexo->name);
        }

        if ($request->file('archivo')) {
            $doc=Documento::find($request->documento_id);     
            $file = $request->file('archivo');
            $name = $doc->tipo_documento. $file->getClientOriginalExtension();
            $file->move($path, $name);
            $anexo->name = $name;         
            $anexo->save();            
        }
        return response()->json(['success' => 'DOCUMENTO ACTUALIZADO EXITOSAMENTE']);
        }else {
            return response()->json(['warning' => 'DOCUMENTO NO ESTA CARGADO']);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
}
