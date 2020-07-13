<div class="modal fade" id="modalDocumentos" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" style="background:#fcd846">
          <h4 class="modal-title">Documentos <i class="fas fa-file-invoice"></i></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="background:whitesmoke">
            <form id="form_create" action="" method="POST" onkeypress="return disableEnterKey(event);">
                @csrf
                    <div class="form-row">
                        <div class="col-md-10 col-sm-10"style="float:left"></div>
                        <div class="col-md-2 col-sm-2">
                            <button style="float:right" type="button" class="btn btn-info btn-md btn-group-vertical" > <i class="fas fa-plus-circle"></i></button>
                        </div>
                            <div class="col-md-6">
                                <label for="">Nombre del Documento</label>
                                    <select name="tipo_documento" class="form-control show stick" style="width: 100%;" >
                                        <option value="">---Escoger Nombre del documento---</option>
                                        @foreach ($documentos as $documento)
                                            <option  value="{{$documento->id}}">{{$documento->tipo_documento}}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="col-md-6">
                                <label for="">Escoger Documentos</label>
                                <input type="file" class="form-control" >
                            </div>
                            <br>
                            <br>
                            <br>
                            <br>
                            <div class="table-responsive">
                            <table id="tabla" class="table table-hover table-sm ">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre del Documento</th>
                                        <th>Nombre del Archivo</th>
                                        <th style="width:20%" class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                         </table>
                        </div>
                    </div>
            </form>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar <i class="fas fa-times-circle"></i></button>
          <button id="guardar" type="button" class="btn btn-dark">Guardar <i class="fas fa-save"></i></button>
        </div>
      </div>
    </div>
</div>

