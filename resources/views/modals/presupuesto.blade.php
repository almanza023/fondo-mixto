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
            <form id="form_presupuesto" action="{{ route('validate-edit.presupuesto') }}" method="POST">
                @csrf
                <input type="hidden" name="proyecto_id" value="{{ $solicitud->proyecto->id }}">
                <input type="hidden" id="idsolicitud" value="{{ $solicitud->id }}">
                    <div class="form-row">
                        <div class="col-md-10 col-sm-10"><h6 style="float:left"><b> PRESUPUESTO DE EGRESOS</b> (Gastos)</h6> <h6 style="float:right"><b> INGRESOS </b>(Fuentes de Financiación)</h6>  </div>
                       
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

                    </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" id="add-presupuesto">Guardar <i class="fas fa-times-circle"></i></button>
        </div>
    </form>
    
      </div>
    </div>
</div>
