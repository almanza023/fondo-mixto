<table id="tabla" class="table table-hover table-sm mejoratb">
    <thead class="thead-light">
        <tr>
            <th class="text-center">#</th>
            <th class="text-center">Indicador</th>
            <th class="text-center">Meta</th>
            <th class="text-center">Estado</th>
            <th class="text-center">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($indicadores as $indicador)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$indicador->nombre_indicador}}</td>
            <td>{{$indicador->meta}}</td>
            <td>
                @if($indicador->status)
                    <button class="btn badge bg-gradient-warning sm" onclick="changeStatus('{{ route('indicador.status', $indicador->id) }}');">Activo</button>
                 @else
                    <button class="btn badge bg-gradient-info sm" onclick="changeStatus('{{ route('indicador.status', $indicador->id) }}');">Inactivo</button>
                @endif
            </td>
            <td style="width: 20%" class="text-center">
                <button type="button" id="" class="btn btn-primary show-details" data-toggle="modal" data-id="{{$indicador->id}}" data-nombre="{{$indicador->nombre_indicador}}" data-eje="{{$indicador->eje_id}}" data-meta="{{$indicador->meta}}" data-target="#modalEdit"> <i class="fas fa-pencil-alt" data-toggle="tooltip" data-placement="top" title="EDITAR"></i></button>
             </td>
        </tr>
        @endforeach
    </tbody>

</table>
