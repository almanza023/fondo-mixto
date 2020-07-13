  <!----Modals edit-->
  <div class="modal fade" id="modalIndicadores" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" id="fondocontainer">
          <h4 class="modal-title">Agregar Indicador <i class="fas fa-paper-plane"></i></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body"style="background:whitesmoke">
           <form action="{{ route('add.indicador') }}" method="POST" id="form_indicadores" >
             @csrf
            <input type="hidden" name="solicitud_id" id="solicitud_id">
            <div class="form-group">
              <label for="">Indicador</label>
              <select name="indicador_id" id="indicador_id" class="form-control select2">
                @foreach ($indicadores as $item)
                    <option value="{{ $item->id }}">{{ $item->nombre_indicador }}</option>
                @endforeach
              </select>
            </div>            
            <div class="form-group">
              <button type="buuton" id="agregar" class="btn btn-primary"> <i class="fa fa-save"></i> AGREGAR</button>
            </div>
           </form>

        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>
