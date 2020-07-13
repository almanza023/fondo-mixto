<!----Modals edit-->
<div class="modal fade" id="modalChange" data-backdrop="static">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header" id="fondocontainer">
        <h4 id="centrartitle">Cambiar Despacho <i class="fas fa-user-plus"></i></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background:#E1E2E3">


        <form id="form_change" action="{{route('empleados.change')}}" method="POST"
          onkeypress="return disableEnterKey(event);">

          @csrf

          <div class="form-row">

            <div class="row">

              <input type="hidden" name="id_change" id="id_change">

              <hr>

              <div class="col-sm-4 col-md-4 col-lg-12">
                <label for="">Dependencia:</label>
                <select class="form-control" name="dependencia_change_id" id="dependencia_change_id">
                  <option value="">-- Escoger Opcion --</option>
                  @foreach ($dependencias as $dependencia)
                  <option value="{{$dependencia->id}}">{{$dependencia->nombre_dependencia}}</option>
                  @endforeach
                </select>
              </div>


              <div class="col-md-4 col-sm-4 col-lg-12">
                <label>Fecha Salida:</label>
                <input type="date" name="fecha_salida" id="fecha_salida" class="form-control">
              </div>

              <div class="col-sm-4 col-md-4 col-lg-12" >
                <label>Motivo:</label>
                <textarea class="form-control" name="motivo" id="motivo"></textarea>
              </div>



            </div>


          </div>
        </form>


      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button id="asignar" type="button" class="btn btn-success">Cambiar <i class="fas fa-save"></i></button>
      </div>
    </div>
  </div>
</div>
