<div class="modal fade" id="modalEdit" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" id="fondocontainer">
          <h4 id="centrartitle">Actualizar Empleado <i class="fas fa-user-plus"></i></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="background:#E1E2E3">

          <form id="form_edit" action="{{route('empleados.update', 'empleado')}}" method="POST"
            onkeypress="return disableEnterKey(event);">

            @csrf
            @method('PATCH')

            <div class="form-row">

              <div class="row">

                <input type="hidden" name="id_row" id="id_row">

                <div class="col-md-4 col-sm-4">
                  <label for=""># Identificacion:</label>
                  <input type="number" name="nid" id="nid" class="form-control">
                </div>

                <div class="col-md-4 col-sm-4">
                  <label for="">Nombre:</label>
                  <input type="text" name="nombre" id="nombre" class="form-control">
                </div>

                <div class="col-md-4 col-sm-4">
                  <label for="">Apellido:</label>
                  <input type="text" name="apellido" id="apellido" class="form-control">
                </div>

                <div class="col-md-8 col-sm-8">
                  <label for="">Correo:</label>
                  <input type="email" name="email" id="email" class="form-control">
                </div>

                <div class="col-md-4 col-sm-4">
                  <label for="">Celular:</label>
                  <input type="number" name="celular" id="celular" class="form-control">
                </div>
             
                <div class="col-md-12 col-sm-12">
                  <label for="">Contraseña:</label>
                  <input type="password" name="password" id="password" class="form-control">
                </div>

                <hr>


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
