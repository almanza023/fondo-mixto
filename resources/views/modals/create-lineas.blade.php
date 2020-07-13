<div class="modal fade" id="modalCreate" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" id="fondocontainer">
          <h4 id="centrartitle">Crear Líneas <i class="fas fa-user-plus"></i></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="background:#E1E2E3">
            <form id="form_create" action="{{route('lineas.store')}}" method="POST" onkeypress="return disableEnterKey(event);">
                @csrf
                <div class="form-row">
                    <div class="col-md-12">
                        <label for="">Nombre de la Línea:</label>
                        <input type="text" name="nombre_linea" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label for="">Descripción:</label>
                        <textarea name="descripcion" class="form-control"></textarea>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar <i class="fas fa-times-circle"></i></button>
          <button id="guardar" type="button" class="btn btn-success">Guardar <i class="fas fa-save"></i></button>
        </div>
      </div>
    </div>
</div>
