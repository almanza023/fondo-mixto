<div class="modal fade" id="modalPoblacion" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" id="fondocontainer">
          <h4 id="centrartitle">Añadir Población <i class="fas fa-user-plus"></i></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="background:#E1E2E3">
                <div class="form-row">

                  <div class="col-md-10 col-sm-10"></div>
                      <div class="col-md-2 col-sm-2">
                            <button style="float:right" id="btnAddPoblacion" type="button" class="btn btn-primary btn-md btn-group-vertical" > <i class="fas fa-plus-circle"></i></button>
                      </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="clasificacion_id-999">Tipo de Poblacion:</label>
                      <select  id="clasificacion_id-999" class="form-control clasificaciones">
                        <option  value="0">-- Escoger Opcion --</option>
                        @foreach ($clasificaciones as $clasificacion)
                      <option value="{{$clasificacion->id}}">{{$clasificacion->tipo_poblacion}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="poblacion_id-999">Poblacion:</label>
                      <select id="poblacion_id-999" class="form-control poblaciones">
                        <option value="0">-- Escoger Opcion --</option>

                      </select>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="total-999">Total:</label>
                      <input type="number" class="form-control" name="total" id="total-999">
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                    <label>Fuente Verificacion</label>
                        <select name="fuente_verificacion[]" id="fuente_verificacion" class="form-control select2bs4 show-tick" style="width: 100%;" multiple>
                            @foreach ($fuentes as $fuente)
                              <option  value="{{$fuente->id}}">{{$fuente->fuente_verificacion}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div id="clonar_poblacion"></div>


                  <br>

                    <div class="table-responsive">
                        <table class="table table-hover table-sm  mejoratb" id="table_poblacion">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Tipo Poblacion</th>
                                    <th>Poblacion</th>
                                    <th>Total</th>
                                    <th style="width:20%" class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody style="background-color:#EBF5FB">

                            </tbody>
                        </table>
                    </div>

                    <input type="hidden" id="table_poblacion_empty" value="1">

                </div>

        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-success" onclick="validatePoblacion('{{route('validate.poblacion')}}')">Completado <i class="fas fa-times-circle"></i></button>
        </div>
      </div>
    </div>
</div>
