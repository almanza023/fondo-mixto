<table id="tabla" class="table table-hover table-sm mejoratb">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre del Eje</th>
            <th>Nombre del Programa</th>
            <th class="text-center">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ejes as $eje)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$eje->nombre_eje}}</td>
            <td>{{$eje->nombre_programa}}</td>
            <td class="text-center">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-id="{{$eje->id}}" data-nombre_eje="{{$eje->nombre_eje}}" data-nombre_programa="{{$eje->nombre_programa}}" data-target="#modalEdit" class="btn btn-warning btn-sm"> <i class="fas fa-pencil-alt"></i>Editar</button>
            </td>
        </tr>

        @endforeach
    </tbody>
</table>

