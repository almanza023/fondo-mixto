   <!----edit create-->
   <div class="modal fade" id="modalEdit" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" id="fondocontainer">
          <h4 id="centrartitle">Editar Población <i class="fas fa-user-plus"></i></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="background:#E1E2E3">
            <form id="form_edit" action="{{route('poblacion.update', 'poblacion')}}" method="POST" onkeypress="return disableEnterKey(event);">
                @csrf
                @method('PATCH')
                <input type="hidden" name="id_row" id="id_row">
                <div class="form-row">
                    <div class="col-md-6">
                        <label for="">Clasificación:</label>
                        <select name="clasificacion_id" id="clasificacion_id" class="form-control">
                            <option value="">--Escoger Clasificación</option>
                            @foreach ($clasificaciones as $clasificacion)
                            <option value="{{$clasificacion->id}}">{{$clasificacion->tipo_poblacion}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="">Detalle:</label>
                       <input type="text" class="form-control" name="detalle" id="detalle">
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar <i class="fas fa-times-circle"></i></button>
          <button id="actualizar" type="button" class="btn btn-success">Actualizar <i class="fas fa-pencil-alt"></i></button>
        </div>
      </div>
    </div>
</div>
