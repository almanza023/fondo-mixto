<div class="modal fade" id="modalAnexos" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" id="fondocontainer">
          <h4 id="centrartitle">Anexos  <i class="fas fa-network-wired"></i></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="background:#E1E2E3">
            <form id="form" action="{{ route('anexos.store') }}" method="POST">
                <input type="hidden" name="solicitud_id" id="solicitud_id">
                @csrf
                    <div class="form-row">        
                          

                            <div class="col-md-12">
                                <label for="nombre_actividad-999">Documento</label>
                                <select name="documento_id" id="documento_id" class="form-control" style="width: 100%;">
                                    @foreach ($documentos as $item)
                                        <option value="{{ $item->id }}" class="categoria{{ $item->categoria }}">{{ $item->tipo_documento }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="fecha_inicio-999">Archivo</label>
                                <input type="file" class="form-control " name="archivo" id="archivo">
                            </div>                           

                    </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-success" id="add-anexo">Agregar <i class="fas fa-times-circle"></i></button>
          
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</i></button>
        </form>
        </div>
      
      </div>
    </div>
</div>
