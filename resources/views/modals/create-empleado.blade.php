<div class="modal fade" id="modalCreate" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" id="fondocontainer">
        <h4 id="centrartitle">Crear Empleado <i class="fas fa-user-plus"></i></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background:#E1E2E3">

        <form id="form_create" action="{{route('empleados.store')}}" method="POST"
          onkeypress="return disableEnterKey(event);">
          @csrf
          <div class="form-row">
            <div class="row">
              <div class="col-md-4 col-sm-4">
                <label for=""># Identificacion:</label>
                <input type="number" name="nid" class="form-control">
              </div>

              <div class="col-md-4 col-sm-4">
                <label for="">Nombre:</label>
                <input type="text" name="nombre" class="form-control">
              </div>

              <div class="col-md-4 col-sm-4">
                <label for="">Apellido:</label>
                <input type="text" name="apellido"  class="form-control">
              </div>

              <div class="col-md-8 col-sm-8">
                <label for="">Correo:</label>
                <input type="email" name="email" class="form-control">
              </div>

              <div class="col-md-4 col-sm-4">
                <label for="">Celular:</label>
                <input type="number" name="celular" class="form-control">
              </div>

              <hr>

              <div class="col-md-8 col-sm-8">
                <label for="">Rol:</label>
                <select class="form-control" name="rol_id">
                  <option value="">-- Escoger Opcion --</option>
                  @foreach ($roles as $r)
                    <option value="{{$r->id}}">{{$r->name}}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-md-4 col-sm-4" style="padding-top:10px; padding-left: 10px">
                <label for="">Jefe:</label>
                <div class="form-group clearfix">

                  <div class="icheck-primary d-inline">
                    <input type="radio" id="jefe_si" name="is_jefe" value="1">
                    <label for="jefe_si">SI
                    </label>
                  </div>
                  <div class="icheck-primary d-inline">
                    <input type="radio" id="jefe_no" name="is_jefe" value="0">
                    <label for="jefe_no">NO
                    </label>
                  </div>
                </div>
              </div>

              <div class="col-md-4 col-sm-4" style="padding-top:10px; padding-left: 10px">
                <label for="">Contraseña:</label>
                <div class="form-group">                 
                    <input type="password" id="password" name="password" class="form-control">
                    
                  </div>                   
                </div>
            


            </div>


          </div>
        </form>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar <i
            class="fas fa-times-circle"></i></button>
        <button id="guardar" type="button" class="btn btn-success">Guardar <i class="fas fa-save"></i></button>
      </div>
    </div>
  </div>
</div>
