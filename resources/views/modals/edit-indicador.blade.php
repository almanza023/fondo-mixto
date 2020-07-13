<div class="modal fade" id="modalEdit" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" id="fondocontainer">
          <h4 id="centrartitle">Actualizar Indicadores <i class="fas fa-user-plus"></i></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="background:#E1E2E3">
          <form id="form_edit" action="{{route('indicadores.update', 'indicador')}}" method="POST" onkeypress="return disableEnterKey(event);">

            @csrf
            @method('PATCH')

            <div class="form-row">

              <input type="hidden" name="id_row" id="id_row">

              <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <label for="">Nombre del Indicador:</label>
                <input type="text" name="nombre_indicador"  id="nombre_indicador" class="form-control">
              </div>

              <div class="col-lg-8 col-md-8 col-sm-12 col-xl-12">
                <label for="">Eje:</label>
                <select class="form-control" name="eje_id" id="eje_id">
                  <option value="">-- Escoger Opcion --</option>
                  @foreach ($ejes as $eje)
                    <option value="{{$eje->id}}">{{$eje->nombre_programa}}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-lg-4 col-md-4 col-sm-12 col-xl-12">
                <label for="">Meta:</label>
                <input type="number" name="meta" id="meta" class="form-control">
              </div>

            </div>
          </form>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar <i
              class="fas fa-times-circle"></i></button>
          <button id="actualizar" type="button" class="btn btn-success">Actualizar <i class="fas fa-pencil-alt"></i></button>
        </div>
      </div>
    </div>
  </div>
