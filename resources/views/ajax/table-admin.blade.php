<table id="tabla" class="display table table-hover table-sm mejoratb">
    <thead class="thead-light">
        <tr>
            <th>#</th>
                <th>Categoria</th>
                <th>Cod Solicitud</th>
                <th>Solicitante</th>
                <th>Descripción</th>      
                <th>Estado</th>          
                <th style="width: 8%">Fecha de Registro</th>               
                 
                <th class="text-center">Acciones</th>
            </tr>
    </thead>
    <tbody>
        @foreach ($solicitudes as $solicitud)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$solicitud->categoria->tipo_solicitud}}</td>
            <td>{{$solicitud->id}}</td>
            <td>
                @if ($solicitud->solicitante->razon_social)
                {{$solicitud->solicitante->razon_social}}
                @else
                {{$solicitud->solicitante->nombre}} {{$solicitud->solicitante->apellido}}
                @endif
            </td>
            <td>{{$solicitud->descripcion}}</td>        
            <td>
                @if (count($solicitud->clausuras)>0)
                Cerrado
                @else
                Abierto
                @endif
                </td>        
            <td style="width: 8%">{{$solicitud->fecha}}</td>                    
            <td class="text-center">
                <button type="button" id="btn_show_detail-{{$solicitud->id}}" class="btn btn-info btn-sm show-details" data-toggle="modal" data-href="{{route('director.show', $solicitud->id)}}" data-target="#modalShow"><i class="fas fa-eye" data-toggle="tooltip" data-placement="top" title="VER DETALLE"></i></button>
                @if ($solicitud->categoria->tipo_solicitud == 'Proyecto')
                @endif

                <a href="{{ route('admin.edit', $solicitud->id) }}" class="btn btn-warning btn-sm">
                    <i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="EDITAR"></i>
                </a>

            </td>
        </tr>

        @endforeach

    </tbody>
</table>
