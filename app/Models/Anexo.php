<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Anexo extends Model
{
    protected $table = 'anexos';

    protected $fillable = [
        'documento_id', 'solicitud_id', 'name', 'status', 'date',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function solicitud()
    {
        return $this->belongsTo('App\Models\Solicitud');
    }

    public function documento()
    {
        return $this->belongsTo('App\Models\Documento');
    }

    public static function getAll(){
        return 
        DB::select("SELECT distinct s.id, s.descripcion, sol.razon_social, sol.nombre, sol.apellido, sol.representante_legal,
        c.tipo_solicitud, p.titulo, COUNT(*) AS total  FROM anexos a
        INNER JOIN solicitudes s ON a.solicitud_id=s.id
        INNER JOIN solicitantes sol on s.solicitante_id=sol.id
        INNER JOIN categorias c ON s.categoria_id=c.id
        INNER JOIN proyectos p ON p.solicitud_id=s.id 
        GROUP BY s.id, s.id, s.descripcion, sol.razon_social, sol.nombre, sol.apellido, sol.representante_legal,
        c.tipo_solicitud, p.titulo");
        
    }

    public static function getId($id){
        return DB::table('anexos as a')
        ->join('documentos as d', 'a.documento_id', '=', 'd.id')
        ->select('a.id as idanexo', 'd.id as iddocumento', 'a.solicitud_id as idsolicitud', 'd.tipo_documento', 'a.name')
        ->where('a.solicitud_id', $id)
        ->orderBy('a.id', 'desc')
        ->get();
    }

}
