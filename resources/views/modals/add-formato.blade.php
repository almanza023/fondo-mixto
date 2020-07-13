<div class="modal fade" id="modalFormato" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" id="fondocontainer">
        <h4 id="centrartitle">Añadir Formato <i class="fas fa-user-plus"></i></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background:#E1E2E3">


        <div class="card card">
          <div class="card-header">
            <h3 class="card-title">Presentacion Proyecto</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            </div>
          </div>
          <!-- /tabla -->
          <div class="card-body">

            <div class="form-row">

                <div class="col-md-6">
                <label for="">Fecha de Inicio</label>
                <input type="date" id="fecha_ini" name="fecha_ini" class="form-control">
              </div>

              <div class="col-md-6">
                <label for="">Fecha Final</label>
                <input type="date" id="fecha_fin" name="fecha_fin"  class="form-control">
              </div>
              {{-- <div class="col-md-12">
                <label for="descripcion_proyecto"><strong>Descripción del proyecto:</strong></label>
                <textarea class="form-control" name="descripcion_proyecto" id="descripcion_proyecto"
                  placeholder="(Describa en que consiste el proyecto, breve descripcion" class="form-control"></textarea>
              </div>
               --}}
              

              <div class="col-md-12">
                <div class="form-group">
                <label>Líneas</label>
                    <select name="id_linea[]" id="id_linea" class="form-control select2bs4 show-tick" style="width: 100%;" multiple>
                      @foreach ($lineas as $linea)
                            <option  value="{{$linea->id}}">{{$linea->descripcion}}</option>
                        @endforeach
                    </select>
                </div>
              </div>

            </div>



          </div>
          <!-- /fin tabla-->          
        </div>

        {{-- Cuerpo de Proyecto --}}
        {{-- <div class="card card collapsed-card">
          <div class="card-header">
            <h3 class="card-title">Cuerpo del Proyecto</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            </div>
          </div>
          <!-- /tabla -->
          <div class="card-body">

            <div class="form-row">


              <div class="col-md-12">
                <label for="antecedentes"><strong>Antecedentes:</strong></label>
                <textarea rows="5"  class="form-control" name="antecedentes" id="antecedentes"
                  placeholder="(Describa en orden cronológico las acciones, que han precedido este proyecto y que fueron pertinentes para su formulación)" class="form-control"></textarea>
              </div>

              <div class="col-md-12">
                <label for="justificacion"><strong>Justificacion:</strong></label>
                <textarea rows="5"  class="form-control" name="justificacion" id="justificacion"
                  placeholder="(Argumente por qué es importante la realización del proyecto y la relación del Proyecto con el Plan de Desarrollo Departamental.)" class="form-control"></textarea>
              </div>


              <div class="col-md-12">
                <label for="metodologia"><strong>Metodologia:</strong></label>
                <textarea rows="5"  class="form-control" name="metodologia" id="metodologia"
                  placeholder="(Describa detalladamente las acciones o actividades a seguir para el desarrollo del proyecto, de acuerdo con los objetivos y las metas)" class="form-control"></textarea>
              </div>


              <div class="col-md-6">
                <label for="objetivo_general"><strong>Objetivo General:</strong></label>
                <textarea rows="5"  class="form-control" name="objetivo_general" id="objetivo_general"
                  placeholder="(Describa que se quiere lograr con el proyecto, es decir, cual es propósito que se pretende alcanzar, debe estar relacionado con la justificación)" class="form-control"></textarea>
              </div>


              <div class="col-md-6">
                <label for="objetivo_especifico"><strong>Objetivo Especifico:</strong></label>
                <textarea rows="5"  class="form-control" name="objetivo_especifico" id="objetivo_especifico"
                  placeholder="(Corresponde a los propósitos más puntuales que contribuya a lograr el objetivo general, Señale tres objetivos específicos)." class="form-control"></textarea>
              </div>

              <div class="col-md-12">
                <label for="metas"><strong>Meta:</strong></label>
                <textarea rows="5"  class="form-control" name="metas" id="metas"
                  placeholder="(Estas deben ser cuantitativas (medibles); Son el resultado de lo que se quiere lograr y están relacionados con los objetivos formulados)." class="form-control"></textarea>
              </div>

            </div>

          </div>
          <!-- /fin tabla-->
          <div class="card-footer">
            Antecedentes, Justificacion, Metodologia, Objetivo General, Objetivos Especificos, Metas.
          </div>
        </div> --}}



      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-success" onclick="validateFormato('{{route('validate.formato')}}')">Completado <i class="fas fa-times-circle"></i></button>
      </div>
    </div>
  </div>
</div>
