<!DOCTYPE html>
<html lang="en">
<head>   
    <title>Reporte de Proyectos Filtro de Fechas</title>
    <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.3/build/pure-min.css" integrity="sha384-cg6SkqEOCV1NbJoCu11+bm0NvBRc8IYLRGXkmNrqUBfTjmMYwNKPWBTIKyw9mHNJ" crossorigin="anonymous">
</head>
<body>
    <div class="header">
        <img src="{{ asset('img/fondomi.png') }}">
     </div>
 
   
    <h1 class="p-text"><center>REPORTE DE PROYECTOS POR RANGOS DE FECHAS</center></h1>
     <h4>Desde {{ $fecha1 }} - Hasta {{ $fecha2 }}</h4>
     <h4>Fecha de Impresión: {{ $date }}</h4>
    <table class="pure-table">
        <thead>
            <tr>
                <th>#</th>
                <th>N° Radicado</th>
                <th>Solicitante</th>                       
                <th>Descripción</th>                
                <th>Inversión Departamento</th>
                <th>Fecha</th>
                
            </tr>
        </thead>
        <tbody>
           @forelse ($solicitudes as $s)
           <tr>
               <td>{{ $loop->iteration }}</td>
               <td>{{ $s->codigo_radicado }}</td>
               @if ($s->razon_social=='Natural')
               <td>{{ $s->nombre. ' '.$s->apellido }}</td>
                @else
                <td>{{ $s->razon_social }}</td> 
               @endif                   
               <td>{{ $s->descripcion }}</td>               
               <td>${{ number_format($s->fondo_mixto, 0) }}</td>
               <td>{{ $s->fecha }}</td>
              
              
           </tr>
               
           @empty
               
           @endforelse
        </tbody>
    </table>
</body>
</html>