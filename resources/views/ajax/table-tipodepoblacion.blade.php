 <table id="tabla" class="table table-hover table-sm mejoratb">
        <thead class="thead-light">
            <tr>
                <th>Item</th>
                <th>Tipo de Población</th>
                <th>Estado</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tipopoblaciones as $tipopoblacion)
                <tr>
                    <td>{{$loop->iteration}}</td>
                <td>{{$tipopoblacion->tipo_poblacion}}</td>
                <td>
                    @if($tipopoblacion->status)

                    <button class="btn badge bg-gradient-warning sm" onclick="changeStatus('{{ route('tipopoblacion.status', $tipopoblacion->id) }}');">Activo</button>
                    @else
                    <button class="btn badge bg-gradient-info sm" onclick="changeStatus('{{ route('tipopoblacion.status', $tipopoblacion->id) }}');">Inactivo</button>
                    @endif
                </td>
                <td class="text-center">
                    <button type="button" class="btn btn-primary show-details" data-toggle="modal" data-id="{{$tipopoblacion->id}}" data-tipo_poblacion="{{$tipopoblacion->tipo_poblacion}}"  data-target="#modalEdit"> <i class="fas fa-pencil-alt" data-toggle="tooltip" data-placement="top" title="EDITAR"></i></button>
                </td>
                </tr>
            @endforeach
        </tbody>

    </table>

