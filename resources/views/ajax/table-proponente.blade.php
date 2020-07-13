<table id="tabla" class="table table-hover table-sm mejoratb">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre del proponente</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($proponentes as $proponente)
            <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$proponente->nombre_proponente}}</td>
            <td class="text-center">
                <button type="button" class="btn btn-primary show-details" data-toggle="modal" data-id="{{$proponente->id}}" data-nombre_proponente="{{$proponente->nombre_proponente}}"  data-target="#modalEdit"> <i class="fas fa-pencil-alt" data-toggle="tooltip" data-placement="top" title="EDITAR"></i></button>
            </td>
            </tr>
        @endforeach
    </tbody>

</table>


