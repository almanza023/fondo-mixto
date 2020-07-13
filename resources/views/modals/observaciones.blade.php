<div class="modal fade" id="modalObservaciones" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" id="fondocontainer">
          <h4 id="centrartitle">Concepto Gerencia  <i class="fas fa-network-wired"></i></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="background:#E1E2E3">
            <form id="form_observacion" action="{{ route('store.observaciones') }}" method="POST">
                <input type="hidden" name="solicitud_id" id="id_solicitud">
                @csrf
                    <div class="form-row">

                      <div class="col-md-12">
                        <label for="estado-999">Estado</label>
                        <select name="estado" id="estado" class="form-control">
                          <option value="">Seleccione</option>
                          <option value="1">Aprobado</option>
                          <option value="2">Rechazado</option>
                        </select>
                    </div>  

                    <div class="col-md-12">
                      <label for="nombre_actividad-999">Valor</label>
                      <input type="number" id="valor" name="valor" class="form-control">
                  </div>         
                  <div class="col-md-12">
                    <label for="nombre_actividad-999">Forma de Pago</label>
                    <input type="text" id="pago" name="pago" class="form-control">
                </div>
                <div class="col-md-12">
                  <label for="nombre_actividad-999">Actividades apoyar</label>
                  <textarea  id="actividades" name="actividades" class="form-control"></textarea>
              </div>     
                <div class="col-md-12">
                  <label for="nombre_actividad-999">Observaciones</label>
                  <textarea  id="observaciones" name="observaciones" class="form-control"></textarea>
              </div>          

                                                   

              </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-success" id="add-observacion">Guardar <i class="fas fa-times-circle"></i></button>
        </form>
        </div>
      
      </div>
    </div>
</div>
