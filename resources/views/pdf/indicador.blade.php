
<!DOCTYPE html>
<html lang="en">
<head>   
    <title>Reporte de Proyectos Filtro de Fechas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
   
    <div class="header">
       <img src="{{ asset('img/fondomi.png') }}">
    </div>

 <table class="table table-bordered" >
   <tr>
     <th>Indicador</th>
     <th>Meta Producto</th>
     <th>Año {{ $year }}</th>
     <th>Ejecución</th>
     <th>% Ejecución</th>
     <th>Observaciones</th>
     <th>Inversión Departamento</th>
     <th>Otras Fuentes</th>
   </tr>
   @foreach ($indicadores as $ind)
  
       <tr>
         <td>{{ $ind->indicador->nombre_indicador }}</td>
         <td>{{ $ind->indicador->meta }}</td>
         <td>{{ $ind->cantidad }}</td>
         @php
         $val=0;
         $otros=0;
             $can=DB::table('indicador_solicitud as ind')->where('indicador_id', $ind->indicador->id)
             ->whereDate('ind.created_at', '>=' ,$date1)
             ->whereDate('ind.created_at', '<=', $date2)

             ->select('ind.solicitud_id')->get();
           
         @endphp
         <td>{{ count($can) }}</td>
         @php
         $cant=count($can);
         $total=($cant*100)/$ind->cantidad    
         @endphp
         <td>{{ round($total, 2) }}%</td>
          <td>
           @foreach ($can as $item)
            @php
            $pre=DB::select('SELECT pro.titulo, p.fondo_mixto AS valor, 
            p.recurso_municipio, p.ministerio_cultura, p.ingreso_propio  FROM presupuestos p INNER JOIN proyectos pro 
            ON p.proyecto_id=pro.id WHERE pro.solicitud_id=?', [ $item->solicitud_id]);
            
            foreach($pre as $p){
              echo '*'. $p->titulo.'-$'.number_format($p->valor).'<br>';
              $val+=$p->valor;
              $otros+=$p->recurso_municipio+$p->ministerio_cultura+$p->ingreso_propio;
            }
           
            @endphp
          @endforeach
          </td>
          <td>${{ number_format($val, 0)}}</td>
          <td>${{ number_format($otros, 0)}}</td>
        
        
        
       </tr>
   @endforeach

  </table>

</body>
</html>