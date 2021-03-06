<table id="tabla" class="table table-hover table-sm mejoratb">
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
                <button type="button" id="btn_show_detail-{{$solicitud->id}}" class="btn btn-info btn-sm show-details" data-toggle="modal" data-href="{{route('proyectos.show', $solicitud->id)}}" data-target="#modalShow"><i class="fas fa-eye" data-toggle="tooltip" data-placement="top" title="VER DETALLE"></i></button>

                {{--
                <button type="button"  id="btn_show_send-{{$solicitud->id}}"
                class="btn btn-success btn-sm" onclick=";"
                data-href=""
                data-toggle="tooltip" data-placement="top" title="ENVIAR A RECEPCION">
                <i class="fas fa-share-square"></i>
                </button>
                --}}

            </td>

        </tr>

        @endforeach

    </tbody>
</table>
