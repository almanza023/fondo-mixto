<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Reporte extends Model
{
    
    public static function getLinea($linea)
    {
        return DB::select("SELECT sol.razon_social, sol.nombre,
        sol.apellido, c.tipo_solicitud as categoria, l.descripcion as linea, p.titulo,
         s.descripcion,  s.created_at, r.codigo_radicado, pre.fondo_mixto 
        FROM linea_proyecto AS lp 
        INNER JOIN lineas l ON l.id=lp.linea_id
        INNER JOIN proyectos p ON lp.proyecto_id=p.id
        INNER JOIN solicitudes s ON s.id=p.solicitud_id
        INNER JOIN solicitantes sol ON s.solicitante_id=sol.id
        INNER JOIN categorias c ON c.id=s.categoria_id      
        INNER JOIN radicado_solicitud rs ON rs.solicitud_id=s.id
        INNER JOIN radicados r ON rs.radicado_id=r.id
        INNER JOIN presupuestos pre ON pre.proyecto_id=p.id
        WHERE lp.linea_id=?  " , [$linea]);
    }

    public static function getFechas($fecha1, $fecha2)
    {
        return DB::select("SELECT sol.razon_social, sol.nombre,
        sol.apellido, c.tipo_solicitud as categoria, l.descripcion as linea, p.titulo,
         s.descripcion, s.fecha, r.codigo_radicado, pre.fondo_mixto  FROM linea_proyecto AS lp 
        INNER JOIN lineas l ON l.id=lp.linea_id
        INNER JOIN proyectos p ON lp.proyecto_id=p.id
        INNER JOIN solicitudes s ON s.id=p.solicitud_id
        INNER JOIN solicitantes sol ON s.solicitante_id=sol.id
        INNER JOIN categorias c ON c.id=s.categoria_id       
        INNER JOIN radicado_solicitud rs ON rs.solicitud_id=s.id
        INNER JOIN radicados r ON rs.radicado_id=r.id
        INNER JOIN presupuestos pre ON pre.proyecto_id=p.id
        WHERE s.fecha>=? and s.fecha<=?
        order by p.id desc", [$fecha1, $fecha2]);
    }
}
