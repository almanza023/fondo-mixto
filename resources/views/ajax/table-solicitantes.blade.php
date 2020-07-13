<table id="tabla" class="table table-hover table-sm mejoratb">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Razon Social</th>
            <th>Representante legal</th>
            <th>Nit/CC</th>
            <th>Correo</th>
            <th>Celular</th>
            <th class="text-center">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($solicitantes as $solicitante)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$solicitante->name_complete}}</td>
            <td>@if($solicitante->razon_social) <span class="badge bg-gradient-warning"> {{$solicitante->razon_social}} </span> @else <span class="badge bg-gradient-warning">Persona Natural</span> @endif</td>
                <td>{{$solicitante->representante_legal}}</td>
                <td>{{$solicitante->nid}}</td>
                <td>{{$solicitante->email}}</td>
                <td>{{$solicitante->celular}}</td>


                <td class="text-center">
                   <button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#modalEdit" data-id="{{$solicitante->id}}"   data-persona_id="{{$solicitante->persona_id}}"  data-proponente_id="{{$solicitante->proponente_id}}"
                    data-nid="{{$solicitante->nid}}" data-nombre="{{$solicitante->nombre}}" data-apellido="{{$solicitante->apellido}}" data-razon_social="{{$solicitante->razon_social}}" data-email="{{$solicitante->email}}"
                    data-direccion="{{$solicitante->direccion}}" data-celular="{{$solicitante->celular}}" data-id_departamento="{{$solicitante->municipio->departamento->id}}" data-municipio_id="{{$solicitante->municipio_id}}"
                    data-representante_legal="{{$solicitante->representante_legal}}" > <i class="fas fa-pencil-alt" data-toggle="tooltip" data-placement="top" title="EDITAR"></i></button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

