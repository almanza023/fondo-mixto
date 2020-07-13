<table id="tabla" class="table table-hover table-sm">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre del Documento</th>
            <th>Requisito</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($documentos as $documento)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$documento->tipo_documento}}</td>
            <td>
                @if($documento->categoria == 1)
                <span class="badge bg-gradient-secondary">Juridico</span>
                @endif

                @if($documento->categoria == 2)
                <span class="badge bg-gradient-teal">Anexos Opcionales</span>
                @endif

                @if($documento->categoria == 3)
                <span class="badge bg-gradient-success">Natural</span>
                @endif

                @if($documento->categoria == 4)
                <span class="badge bg-gradient-blue">Mixto (Juridico-Natural)</span>
                @endif
            </td>
            <td class="text-center">
             <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-id="{{$documento->id}}" data-nombre="{{$documento->tipo_documento}}" data-categoria="{{$documento->categoria}}" data-target="#modalEdit"> <i class="fas fa-pencil-alt"></i>Editar</button>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
