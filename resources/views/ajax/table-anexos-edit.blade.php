<table id="tabla" class="table table-hover table-sm mejoratb">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Documento</th>
            <th>Archivo</th>        
            <th>Acciones</th>               
        </tr>
    </thead>
    <tbody>

      @forelse ($anexos as $anexo)
      <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$anexo->documento->tipo_documento}}</td>
        <td>
          <a target="_blank" href="{{ asset('/documentos/solicitudes/'.$anexo->solicitud_id.'/'.$anexo->name) }}"
            class="btn btn-primary btn-sm"> <i class="fa fa-eye"></i></a>
        </td>  
       <td>
        @if(count($solicitud->clausuras)==0)
        <form class="form-del-ane" action="{{ route('delete.anexo', [$anexo->id, $solicitud->id]) }}" method="POST" style="width: 8%">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger btn-sm del-anexo" type="button" > X</button>

      </form>
      @endif
       </td>

     </tr>
      @empty
         
      @endforelse                  
    </tbody>
</table>