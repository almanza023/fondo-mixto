<div class="modal fade" id="modalEditPerfil" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" style="background:#fcd846">
          <h4 class="modal-title">Actualizar Contraseñas <i class="fas fa-file-invoice"></i></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="background:whitesmoke">
            <form id="form_perfil" action="{{ route('update.perfil', auth()->user()->id) }}" method="POST" onkeypress="return disableEnterKey(event);">
                @csrf
                @method('PUT')
                <div class="table-responsive">
                    <table class="table table-hover">
                        <tr>
                            <th>CORREO</th>
                            <td>{{ auth()->user()->email }}</td>
                        </tr>
                        <tr>
                            <th>USUARIO</th>
                            <td>{{ auth()->user()->documento }}</td>
                        </tr>
                        <tr>
                            <th>NUEVA CONTRASEÑA</th>
                            <td>
                                <input type="password" class="form-control" name="password" id="password">
                            </td>
                        </tr>
                        <tr>
                            <th>CONFIRMAR CONTRASEÑA</th>
                            <td>
                                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                            </td>
                        </tr>
                    </table>
                </div> 
            </form>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar <i class="fas fa-times-circle"></i></button>
          <button id="btn-perfil" type="button" class="btn btn-primary">Guardar <i class="fas fa-save"></i></button>
        </div>
      </div>
    </div>
</div>

