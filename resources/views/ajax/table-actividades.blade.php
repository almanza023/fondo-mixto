<table  class="table table-hover table-sm mejoratb">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Actividad</th>
            <th>Inicio</th>
            <th>Fin</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($solicitud->proyecto->actividades as $actividad)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$actividad->nombre_actividad}}</td>
            <td>{{$actividad->fecha_inicio}}</td>
            <td>{{$actividad->fecha_final}}</td>
            <td>
                @if(count($solicitud->clausuras)==0)
                <form id="form-del-act" action="{{ route('delete.actividad', [$actividad->id, $solicitud->id]) }}" method="POST" style="width: 8%">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="buttin" id="del-actividad"> X</button>

                </form>
                @endif

            </td>
         </tr>
        @empty
         
     @endforelse 
    </tbody>
</table>