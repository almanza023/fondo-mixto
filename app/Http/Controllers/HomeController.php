<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\Solicitante;
use App\Models\Solicitud;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
       

        $solicitantes=DB::table('solicitantes')->count();
        $solicitudes=DB::table('solicitudes')->count();
        $proyectos=DB::table('proyectos')->count();

        $rec = DB::table('historiales')->where('estado_id', 1)->where('status', 1)->count();
        $ger = DB::table('historiales')->where('estado_id', 2)->where('status', 1)->count();
        $asi = DB::table('historiales')->where('estado_id', 3)->where('status', 1)->count();
        $jur = DB::table('historiales')->where('estado_id', 4)->where('status', 1)->count();
        $pro = DB::table('historiales')->where('estado_id', 11)->where('status', 1)->count();
       
        $apro = DB::table('proceso_proyecto')->where('proceso_id', 1)->where('status', 1)->count();
        $rech = DB::table('proceso_proyecto')->where('proceso_id', 2)->where('status', 1)->count();
        $val = DB::table('proceso_proyecto')->where('proceso_id', 3)->where('status', 1)->count();
        $fin = DB::table('proceso_proyecto')->where('proceso_id', 4)->where('status', 1)->count();
        $enc = DB::table('proceso_proyecto')->where('proceso_id', 5)->where('status', 1)->count();
        $fina = DB::table('proceso_proyecto')->where('proceso_id', 6)->where('status', 1)->count();

        $pro = DB::table('solicitudes')->where('categoria_id', 1)->where('status', 1)->count();
        $dep = DB::table('solicitudes')->where('categoria_id', 2)->where('status', 1)->count();
        $apo = DB::table('solicitudes')->where('categoria_id', 3)->where('status', 1)->count();
        $nor = DB::table('solicitudes')->where('categoria_id', 4)->where('status', 1)->count();


        return view('home', compact('solicitantes', 'solicitudes', 
        'proyectos', 'rec', 'ger', 'asi', 'jur', 'pro', 'apro', 'rech', 'val', 'fin', 'enc',
        'fina', 'pro', 'dep', 'apo', 'nor'));
    }
}
