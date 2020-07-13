<div class="modal fade" id="modalPresupuesto" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" id="fondocontainer">
          <h4 id="centrartitle">Presupuesto General <i class="fas fa-hand-holding-usd"></i></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="background:#E1E2E3">
                    <div class="form-row">
                        <div class="col-md-10 col-sm-10"><h6 style="float:left"><b> PRESUPUESTO DE EGRESOS</b> (Gastos)</h6> <h6 style="float:right"><b> INGRESOS </b>(Fuentes de Financiación)</h6>  </div>
                        <div class="col-md-2 col-sm-2">
                            <button style="float:right" type="button" id="btnAddPresupuesto" class="btn btn-primary btn-md btn-group-vertical" > <i class="fas fa-plus-circle"></i></button>
                        </div>
                        <br> <br>
                           
                                <input type="hidden" class="form-control" name="rubro" id="rubro-999" value="0">
                          

                            <div class="col-md-4">
                                <label for="">Recursos del Municipio</label>
                                <input type="number" class="form-control" name="recurso_municipio" id="recurso_municipio-999">
                            </div>
                            
                            <div class="col-md-8">
                                <label for="">Gobernación de Sucre (Fondo Mixto)</label>
                                <input type="number" class="form-control" name="fondo_mixto" id="fondo_mixto-999">
                            </div>

                            <div class="col-md-6">
                                <label for="">Ministerio de Cultura</label>
                                <input type="number" class="form-control" name="ministerio_cultura" id="ministerio_cultura-999">
                            </div>

                            <div class="col-md-6">
                                <label for="">Ingresos Propios</label>
                                <input type="number" class="form-control" name="ingreso_propio" id="ingreso_propio-999">
                            </div>

                            <div class="col-md-12">
                                <label for="">Total</label>
                                <input type="number" class="form-control"  id="ptotal" readonly>
                            </div>

                            <div id="clonar_presupuesto"></div>


                            <div class="table-responsive">
                                <br>
                                <table id="table_presupuesto" class="table table-hover table-sm mejoratb">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Rubro</th>
                                            <th>Recursos Municipio</th>
                                            <th>Fondo Mixto</th>
                                            <th>Ministerio Cultura</th>
                                            <th>Ingresos Propios</th>
                                            <th style="width:20%" class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody style="background-color:#EBF5FB">

                                    </tbody>
                                </table>
                            </div>

                        <input type="hidden" id="table_presupuesto_empty" value="1">

                    </div>

        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-success" onclick="validatePresupuesto('{{route('validate.presupuesto')}}')">Completado <i class="fas fa-times-circle"></i></button>
        </div>
      </div>
    </div>
</div>
