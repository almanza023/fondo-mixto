
<table id="tabla" class="display table table-hover table-sm mejoratb">
    <thead class="thead-light">
        <tr>
            <th>#</th>
                <th>Categoria</th>
                <th>Solicitante</th>
                <th>Descripción</th>                
                         
                <th class="text-center">Acciones</th>
            </tr>
    </thead>
    <tbody>
        @foreach ($solicitudes as $solicitud)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$solicitud->categoria->tipo_solicitud}}</td>
            <td>
                @if ($solicitud->solicitante->razon_social)
                {{$solicitud->solicitante->razon_social}}
                @else
                {{$solicitud->solicitante->nombre}} {{$solicitud->solicitante->apellido}}
                @endif
            </td>
            <td>{{$solicitud->descripcion}}</td>            
                   
            <td class="text-center">
               
                <button type="button" id="btn_show_detail-{{$solicitud->id}}" class="btn btn-info btn-sm show-details" data-toggle="modal" data-href="{{route('management.show', $solicitud->id)}}" data-target="#modalShow"><i class="fas fa-eye" data-toggle="tooltip" data-placement="top" title="VER DETALLE"></i></button>
                @if (count($solicitud->observaciones) ==0)
                <button type="button" class="btn btn-primary btn-sm show-details" data-toggle="modal" data-target="#modalObservaciones" data-id="{{ $solicitud->id }}"><i class="fas fa-check" data-toggle="tooltip" data-placement="top" title="AGREGAR OBSERVACIONES"></i></button>
                @endif
               
                <button type="button" class="btn btn-warning btn-sm show-details" data-toggle="modal" data-target="#modalIndicadores" data-id="{{ $solicitud->id }}"><i class="fas fa-chart-bar" data-toggle="tooltip" data-placement="top" title="AGREGAR INDICADORES"></i></button>
                

            </td>

        </tr>

        @endforeach

    </tbody>
</table>


