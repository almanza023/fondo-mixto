<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Solicitud extends Model
{
    use SoftDeletes;

    protected $table = 'solicitudes';

    protected $fillable = [
        'categoria_id', 'solicitante_id', 'archivo', 'valor', 'status', 'descripcion',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected $dates = ['deleted_at'];

    public function proyecto()
    {
        return $this->hasOne('App\Models\Proyecto');
    }

    public function solicitante()
    {
        return $this->belongsTo('App\Models\Solicitante');
    }

    public function categoria()
    {
        return $this->belongsTo('App\Models\Categoria');
    }

    public function clausuras()
    {
        return $this->hasMany('App\Models\ClausuraSolicitud');
    }

    

    public function historiales()
    {
        return $this->hasMany('App\Models\Historial');
    }

    public function anexos()
    {
        return $this->hasMany('App\Models\Anexo', 'solicitud_id');
    }

    public function observaciones()
    {
        return $this->hasMany('App\Models\ObservacionSolicitud', 'solicitud_id');
    }

    public function radicados()
    {
        return $this->belongsToMany('App\Models\Radicado')->withTimestamps();
    }

    public function radicadoCurrent()
    {
        return $this->belongsToMany('App\Models\Radicado')->wherePivot('status', 1);
    }

    public function indicadores()
    {
        return $this->belongsToMany('App\Models\Indicador');
    }

    public function indicador()
    {
        return $this->belongsTo('App\Models\IndicadorMeta');
    }

    public function poblaciones()
    {
        return $this->belongsToMany('App\Models\Poblacion')
            ->withPivot('numero_persona')
            ->withTimestamps();
    }

    public function documentos()
    {
        return $this->belongsToMany('App\Models\Documento', 'anexos');
    }

  

    

    public function estados()
    {
        return $this->belongsToMany('App\Models\Estado', 'historiales')
            ->withTimestamps()
            ->wherePivot('status', 1);
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'historiales');
    }

    public static function getSolicitudes(){
        return DB::select("SELECT s.id, s.descripcion, sol.razon_social, sol.nombre, sol.apellido, sol.representante_legal,
        c.tipo_solicitud, p.titulo, sol.nid FROM solicitudes s
        INNER JOIN solicitantes sol on s.solicitante_id=sol.id
        INNER JOIN categorias c ON s.categoria_id=c.id
        INNER JOIN proyectos p ON p.solicitud_id=s.id 
        ");
    }

    public function setDescripcionAttribute($value)
    {
        $this->attributes['descripcion'] = strtoupper($value);
    }
     
}
