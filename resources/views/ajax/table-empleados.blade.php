<table id="tabla" class="table table-hover table-sm mejoratb">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Empleado</th>
            <th>Email</th>
            <th>Celular</th>           
            <th>Jefe</th>
            <th>Usuario</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($empleados as $empleado)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$empleado->name_complete}}</td>
            <td>{{$empleado->email}}</td>
            <td>{{$empleado->celular}}</td>
                

            <td>
                @if($empleado->is_jefe)
                    <button class="btn badge bg-gradient-warning sm" onclick="changeBoss('{{ route('empleados.status', $empleado->id) }}');">SI</button>
                 @else
                    <button class="btn badge bg-gradient-info sm" onclick="changeBoss('{{ route('empleados.status', $empleado->id) }}');">NO</button>
                @endif
            </td>
            <td>{{$empleado->user->documento}}</td>
            <td class="text-center">
                <div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Opciones
                    </button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">                     
                      <button type="button" class="btn btn-primary dropdown-item" data-toggle="modal" data-id="{{$empleado->id}}" data-nid="{{$empleado->nid}}" data-nombre="{{$empleado->nombre}}" data-apellido="{{$empleado->apellido}}" data-email="{{$empleado->email}}" data-celular="{{$empleado->celular}}"  data-target="#modalEdit"> <i class="fas fa-pencil-alt"></i>Editar</button>
                      <button type="button" class="btn btn-info dropdown-item" data-toggle="modal" data-href="{{route('empleados.show', $empleado->id)}}" data-target="#modalShow" class="btn btn-warning btn-sm"> <i class="fas fa-eye"></i>Ver</button>
                    </div>
                  </div>
                </div>
              
            </td>

          
        </tr>
        @endforeach
    </tbody>

</table>


