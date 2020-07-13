<table id="tabla" class="table table-hover table-sm mejoratb">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre de la dependencia</th>
            <th>Descripción</th>
            <th class="text-center">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dependencias as $dependencia)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$dependencia->nombre_dependencia}}</td>
                <td>{{$dependencia->descripcion}}</td>
                <td class="text-center">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-id="{{$dependencia->id}}" data-nombre_dependencia="{{$dependencia->nombre_dependencia}}" data-descripcion="{{$dependencia->descripcion}}" data-target="#modalEdit" class="btn btn-warning btn-sm"> <i class="fas fa-pencil-alt"></i>Editar</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

