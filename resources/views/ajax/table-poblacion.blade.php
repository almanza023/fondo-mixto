<table id="tabla" class="table table-hover table-sm mejoratb">
    <thead class="thead-right">
        <tr>
            <th>Item</th>
            <th>Clasificacion</th>
            <th>Detalle</th>
            <th style="width:20%" class="text-center">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($poblaciones as $poblacion)
            <tr>
                <td>{{$loop->iteration}}</td>
            <td>

                @if($poblacion->clasificacion_id == 1)
                    <span class="badge bg-gradient-primary">{{$poblacion->clasificacion->tipo_poblacion}}</span>
                @endif

                @if($poblacion->clasificacion_id == 2)
                    <span class="badge bg-warning">{{$poblacion->clasificacion->tipo_poblacion}}</span>
                @endif

                @if($poblacion->clasificacion_id == 3)
                    <span class="badge bg-secondary">{{$poblacion->clasificacion->tipo_poblacion}}</span>
                @endif

                @if($poblacion->clasificacion_id == 4)
                    <span class="badge bg-info">{{$poblacion->clasificacion->tipo_poblacion}}</span>
                @endif

                @if($poblacion->clasificacion_id > 4)
                    <span class="badge bg-danger">{{$poblacion->clasificacion->tipo_poblacion}}</span>
                @endif

            </td>
            <td>{{$poblacion->detalle}}</td>
            <td class="text-center">
                <button type="button" class="btn btn-primary show-details" data-toggle="modal" data-id="{{$poblacion->id}}" data-item="{{$poblacion->item}}" data-clasificacion_id="{{$poblacion->clasificacion_id}}" data-detalle="{{$poblacion->detalle}}"  data-target="#modalEdit"> <i class="fas fa-pencil-alt" data-toggle="tooltip" data-placement="top" title="EDITAR"></i></button>
            </td>
            </tr>
        @endforeach
    </tbody>

</table>
