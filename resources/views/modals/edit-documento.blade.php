<div class="modal fade" id="modalEdit" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" style="background:#fcd846">
          <h4 class="modal-title">Editar Documentos <i class="fas fa-user-plus"></i></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="background:whitesmoke">

          <form id="form_edit" action="{{route('documentos.update', 'documento')}}" method="POST" onkeypress="return disableEnterKey(event);">

            @csrf
            @method('PATCH')

            <div class="form-row">

              <input type="hidden" name="id_row" id="id_row">

              <div class="col-md-6 col-sm-12 col-xl-12">
                <label for="">Nombre del Documento:</label>
                <input type="text" name="tipo_documento" id="tipo_documento" class="form-control" onkeypress="return disableEnterKey(event);">
              </div>

              <div class="col-md-6 col-sm-12 col-xl-12">
                <label for="">Requisito Para:</label>
                <select name="categoria" id="categoria" class="form-control">
                  <option value="">-- Escoger Opcion --</option>
                  <option value="1">Juridico</option>
                  <option value="3">Natural</option>
                  <option value="4">Mixto (Juridico - Natural)</option>
                  <option value="2">Anexos Adicionales</option>
                </select>
              </div>

            </div>
          </form>
        </div>

        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar <i
              class="fas fa-times-circle"></i></button>
          <button id="actualizar" type="button" class="btn btn-dark">Actualizar <i class="fas fa-pencil-alt"></i></button>
        </div>
      </div>
    </div>
  </div>
