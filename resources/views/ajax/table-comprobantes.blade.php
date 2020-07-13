<table id="tabla" class="table table-hover table-sm mejoratb">
    <thead class="thead-light">
        <tr>
            <th>#</th>               
                <th>Banco</th>
                <th>Nit</th>
                <th>Fecha</th>
                <th>Cheque N°</th>
                <th class="text-center">Acciones</th>
            </tr>
    </thead>
    <tbody>
        @foreach ($comprobantes as $c)
        <tr>
            <td>{{$loop->iteration}}</td>           
            <td>{{$c->banco}}</td>
            <td>{{$c->nit}}</td>
            <td>{{$c->fecha}}</td>
            <td>{{$c->cheque}}</td>
            <td class="text-center">
               <a href="{{ route('comprobantes.show', $c->id) }}" class="btn btn-info btn-sm"> <i class="fas fa-eye" data-toggle="tooltip" data-placement="top" title="VER DETALLES"></i></a>
            
            
                <a href="{{ route('comprobantes.edit', $c->id) }}" class="btn btn-warning btn-sm"> <i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="EDITAR"></i></a>
                <form class="form-del-com" action="{{ route('comprobantes.destroy', $c->id) }}" method="POST" >
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger btn-sm del-comprobante"><i class="fas fa-window-close" data-toggle="tooltip" data-placement="top" title="ELIMINAR"></i></button>
                </form>
            </td>
        </tr>

        @endforeach

    </tbody>
</table>
