<div class="modal fade" id="modalActividades" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" id="fondocontainer">
          <h4 id="centrartitle">Actividades  <i class="fas fa-network-wired"></i></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="background:#E1E2E3">
            <form id="form_actividad" action="{{ route('validate.actividad') }}" method="POST">
                <input type="hidden" name="proyecto_id" id="proyecto_id">
                @csrf
                    <div class="form-row">

                            <div class="col-md-10 col-sm-10"></div>
                          

                            <div class="col-md-12">
                                <label for="nombre_actividad-999">Actividades</label>
                                <textarea  id="nombre_actividad" name="nombre_actividad" class="form-control"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="fecha_inicio-999">Fecha de Inicio</label>
                                <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio">
                            </div>
                            <div class="col-md-6">
                                <label for="fecha_final-999">Fecha de Finalización</label>
                                <input type="date" class="form-control" id="fecha_final" name="fecha_final">
                            </div>

                    </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-success" id="add-actividad">Guardar <i class="fas fa-times-circle"></i></button>
        </form>
        </div>
      
      </div>
    </div>
</div>
