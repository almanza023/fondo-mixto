<div class="modal fade" id="modalCreate2" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" id="fondocontainer">
          <h4 id="centrartitle">Metas Anual Por Indicador<i class="fas fa-user-plus"></i></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="background:#E1E2E3">
          <form id="form_create2" action="{{route('indicador-meta.store')}}" method="POST" onkeypress="return disableEnterKey(event);">
            @csrf

            <div class="form-row">

              <div class="col-lg-8 col-md-8 col-sm-12 col-xl-12">
                <label for="">Indicador:</label>
                <select class="form-control" name="indicador_id" id="indicador_id" style="width: 100%">
                  <option value="">-- Escoger Opcion --</option>
                  @foreach ($indicadores as $ind)
                    <option value="{{$ind->id}}">{{$ind->nombre_indicador}}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-lg-8 col-md-8 col-sm-12 col-xl-12">
                <label for="">Año:</label>
                <select class="form-control" name="year" id="year">
                  <option value="">-- Escoger Opcion --</option>
                  <option value="2020">2020</option>
                  <option value="2021">2021</option>
                  <option value="2022">2022</option>
                  <option value="2023">2023</option>
                </select>
              </div>

              <div class="col-lg-4 col-md-4 col-sm-12 col-xl-12">
                <label for="">Cantidad:</label>
                <input type="number" name="cantidad" id="cantidad" class="form-control">
              </div>

            </div>
          </form>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar <i
              class="fas fa-times-circle"></i></button>
          <button id="guardar2" type="button" class="btn btn-success">Guardar <i class="fas fa-save"></i></button>
        </div>
      </div>
    </div>
  </div>
