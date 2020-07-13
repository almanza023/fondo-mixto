<!DOCTYPE html>
<html lang="en">
<head>   
    <title>Reporte de Proyectos Filtro Por Lineas y Estado</title>
    <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.3/build/pure-min.css" integrity="sha384-cg6SkqEOCV1NbJoCu11+bm0NvBRc8IYLRGXkmNrqUBfTjmMYwNKPWBTIKyw9mHNJ" crossorigin="anonymous">
</head>
<body>
    <div class="header">
        <img src="{{ asset('img/fondomi.png') }}">
     </div>
   
    <h1 class="p-text"><center>REPORTE DE PROYECTOS POR LÍNEA</center></h1>
    @if (count($solicitudes)>0)
    <h3>Línea - {{ $solicitudes[0]->linea }}</h3>
    <p>Fecha de Impresión: {{ $date }}</p>
    
    @endif
    <table class="pure-table">
        <thead>
            <tr>
                <th>#</th>
                <th>N° Radicado</th>
                <th>Solicitante</th>                       
                <th>Descripción</th>
                <th>Rubro</th>
                <th>Fecha de Creación</th>
                
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
               <td>{{ $s->created_at }}</td>
              
              
           </tr>
               
           @empty
               
           @endforelse
        </tbody>
    </table>
   
</body>

</html>