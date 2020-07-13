<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangeDependenciaRequest;
use App\Http\Requests\EmpleadosRequest;
use App\Http\Requests\EmpleadoUpdateRequest;
use App\Http\Requests\PerfilRequest;
use App\Models\Dependencia;
use App\Models\DependenciaEmpleado;
use App\Models\Empleado;
use App\User;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmpleadoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $empleados = Empleado::get(['id', 'nombre', 'apellido', 'email', 'celular', 'is_jefe', 'nid']);
        
        
        $roles=Role::all(['id', 'name']);

        if (request()->ajax()) {
            $empleados = Empleado::with('currentDependencia')->get(['id', 'nombre', 'apellido', 'email', 'celular', 'is_jefe', 'nid']);

            if (count($empleados) == 0) {
                return response()->json(['warning' => 'ERROR EN EL SERVIDOR']);
            } else {
                return response()->view('ajax.table-empleados', compact('empleados'));
            }
        }
        return view('empleados.index', compact('empleados', 'roles'));
    }

    public function store(EmpleadosRequest $request)
    {
        if (request()->ajax()) {

           
            $empleado = new Empleado();

            $empleado = $this->createObjectEmpleado($request, $empleado);

            DB::beginTransaction();
            try {

                $empleado->save();
                $user=$this->storeUserEmpleado($request->password, $request->nid, $empleado);   
                             
                $this->userRol($request->rol_id, $user);
                DB::commit();
                return response()->json(['success' => 'EMPLEADO CREADO CON EXITO!']);

            } catch (\Exception $ex) {
                DB::rollback();
                return response()->json(['warning' => $ex->getMessage()]);
            }

        }
    }

    public function createObjectEmpleado($request, $empleado)
    {

        $empleado->nid = $request->nid;
        $empleado->nombre = $request->nombre;
        $empleado->apellido = $request->apellido;
        $empleado->celular = $request->celular;
        $empleado->email = $request->email;
        $empleado->is_jefe = $request->is_jefe;

        return $empleado;

    }

    public function storeUserEmpleado($password, $nid,  $empleado)
    {
        $user=User::create([
            'email' => $empleado->email,
            'password' => Hash::make($password),
            'usable_id' => $empleado->id,
            'documento' => $nid,
            'empleado_id'=>$empleado->id,
            'is_password' => 0,
        ]);
        return $user;
    }

    public function userRol($id, $user){
        if($id==1){
            $user->assignRoles('recepcionista');
        }else if($id==2){
            $user->assignRoles('gerencia');
        }else if($id==3){
            $user->assignRoles('asistente-administrativo');
        }else if($id==4){
            $user->assignRoles('juridica');
        }else if($id==5){
            $user->assignRoles('proyectos');
        }else if($id==6){
            $user->assignRoles('administrador');
        }
    }
    

    public function show($id)
    {
        if (request()->ajax()) {
            $empleado = Empleado::find($id);            
            return response()->view('ajax.detail-empleado', compact('empleado'));
        }
    }

    public function update(EmpleadoUpdateRequest $request, $id)
    {
        if (request()->ajax()) {
            Empleado::findOrFail($request->id_row)->update($request->all());
            if(!empty($request->password)){
                User::where('empleado_id', $id)->update(['password'=>Hash::make($request->password)]);
                return response()->json(['success' => 'DATOS DE EMPLEADO Y CONTRASEÑA ACTUALIZADO CON EXITO!']);
            }
            return response()->json(['success' => 'DATOS DE EMPLEADO ACTUALIZADO CON EXITO!']);
        }

    }

    public function changeBoss($id)
    {
        $empleado = Empleado::findOrFail($id);

        if ($empleado->is_jefe) {
            $empleado->update(['is_jefe' => 0]);
        } else {
            $empleado->update(['is_jefe' => 1]);
        }

        return response()->json(['success' => 'ESTADO DE EMPLEADO ACTUALIZADO CON EXITO!']);
    }

    public function storeChangeDependencia(ChangeDependenciaRequest $request)
    {
        if (request()->ajax()) {

            $puesto = DependenciaEmpleado::where('empleado_id', $request->id_change)->orderBy('id', 'DESC')->first();

            $empleado = Empleado::findOrFail($request->id_change);

            foreach ($empleado->historyDependencias as $history) {
                if ($puesto->id == $history->id) {
                    $empleado->dependencias()->updateExistingPivot($history->dependencia_id, ['status' => 0, 'motivo' => $request->motivo, 'fecha_salida' => $request->fecha_salida]);
                }
                $empleado->dependencias()->updateExistingPivot($history->dependencia_id, ['status' => 0]);
            }

            $empleado->dependencias()->attach($request->dependencia_change_id, ['status' => 1]);

            return response()->json(['success' => 'CAMBIO DE EMPLEADO CON EXITO!']);

        }
    }

    public function updatePerfil(PerfilRequest $request, $id)
    {
        if (request()->ajax()) {

           $user=User::find($id);
           if($request->password==$request->password_confirmation){
            $user->password=Hash::make($request->password);
            $user->save();
            return response()->json(['success' => 'CAMBIO DE CONTRASEÑA  EXITO!']);
           }
           return response()->json(['warning' => 'CONTRASEÑAS NO CONINCIDEN']);
           

        }
    }

}
