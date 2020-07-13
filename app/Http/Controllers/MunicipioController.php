<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;

class MunicipioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function changeMunicipalities($id)
    {
        if (request()->ajax()) {
            $departament = Departamento::with('municipios')->where('id', $id)->first();
            return response()->json($departament->municipios);
        }
    }

}
