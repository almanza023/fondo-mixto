<table id="tabla" class="table table-hover table-sm mejoratb">
    <thead class="thead-light">
        <tr>
            <th>#</th>
                <th>Titulo</th>
                <th>Proponente</th>
                <th>Descripción</th>
                <th>Tipo de Solicitud</th>
                <th>Cantidad de Archivos</th>
                <th class="text-center">Acciones</th>
            </tr>
    </thead>
    <tbody>
        @foreach ($anexos as $a)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$a->titulo}}</td>
            <td>
                @if ($a->razon_social!='Natural')
                {{$a->razon_social}}
                @else
                {{$a->nombre}} {{$a->apellido}}
                @endif
            </td>
            <td>{{$a->descripcion}}</td>
            <td>{{$a->tipo_solicitud}}</td>
            <td>{{$a->total}}</td>
            <td class="text-center">
               <a href="{{ route('anexos.show', $a->id) }}" class="btn btn-info btn-sm"> <i class="fas fa-eye" data-toggle="tooltip" data-placement="top" title="VER DETALLES"></i></a>
            </td>
        </tr>

        @endforeach

    </tbody>
</table>
