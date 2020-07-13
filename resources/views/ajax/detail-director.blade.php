
<div class="col-md-12 col-sm-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          <i class="fas fa-text-width"></i>
          Informacion Solicitud:
        </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
          </div>
      </div>

  {{-- validacion aqui  --}}
  @if($solicitud->categoria->tipo_solicitud !== 'Proyecto')

  <div class="card-body">
    <dl class="row">
      <dt class="col-sm-4">Radicado:</dt>
      <dd class="col-sm-8">#{{$solicitud->radicadoCurrent->first()->codigo_radicado}}</dd>
        <dt class="col-sm-4">Categoria:</dt>
        <dd class="col-sm-8">{{$solicitud->categoria->tipo_solicitud}}</dd>

        <dt class="col-sm-4">Solicitante:</dt>
        <dd class="col-sm-8">
            @if ($solicitud->solicitante->razon_social)
            {{$solicitud->solicitante->razon_social}}
            @else
            {{$solicitud->solicitante->nombre}} {{$solicitud->solicitante->apellido}}
            @endif
        </dd>

        <dt class="col-sm-4">Descripcion</dt>
        <dd class="col-sm-8">
            {{$solicitud->descripcion}}
        </dd>

        <dt class="col-sm-4">Archivo</dt>
    <dd class="col-sm-8">@if($solicitud->archivo) <a target="_blank" href="{{asset('documentos/solicitudes/')}}/{{$solicitud->id.'/'.$solicitud->archivo}}">PDF</a> @else No se cargo archivo @endif</dd>
    </dl>
    @if (count($solicitud->clausuras)==0)
        
    
    <button type="button" id="btn_show_send2-{{$solicitud->id}}" class="btn btn-primary btn-sm" onclick="enviarRecepcion(this);" data-href="{{route('solicitud.recepcion', $solicitud->id)}}" data-toggle="tooltip" data-placement="top" title="ENVIAR A RECEPCION">RECEPCION</button>
    <button type="button" id="btn_show_send6-{{$solicitud->id}}" class="btn btn-default btn-sm" onclick="enviarAsistente(this);" data-href="{{route('solicitud.asistente', $solicitud->id)}}" data-toggle="tooltip" data-placement="top" title="ENVIAR A ASISTENTE">ASISTENTE</button>

    <button type="button" id="btn_show_send2-{{$solicitud->id}}" class="btn btn-info btn-sm" onclick="sendManagement(this);" data-href="{{route('solicitud.management', $solicitud->id)}}" data-toggle="tooltip" data-placement="top" title="ENVIAR A GERENCIA">GERENCIA</button>
    <button type="button" id="btn_show_send-{{$solicitud->id}}" class="btn btn-success btn-sm" onclick="enviarJuridica(this);" data-href="{{route('solicitud.juridica', $solicitud->id)}}" data-toggle="tooltip" data-placement="top" title="ENVIAR A JURIDICA">JURIDICA</i></button>
        
    <button type="button" id="btn_show_send-{{$solicitud->id}}" class="btn btn-warning btn-sm" onclick="enviarProyectos(this);" data-href="{{route('solicitud.proyectos', $solicitud->id)}}" data-toggle="tooltip" data-placement="top" title="ENVIAR A PROYECTOS">PROYECTOS</i></button>
   @endif
  </div>
    </div>
  
  @endif


{{-- division --}}

  @if($solicitud->categoria->tipo_solicitud == 'Proyecto')
      <!-- /.card-header -->

      <div class="card-body">
        <dl class="row">
            <dt class="col-sm-4">Radicado:</dt>
            <dd class="col-sm-8">#{{$solicitud->radicadoCurrent->first()->codigo_radicado}}</dd>
            <dt class="col-sm-4">Estado:</dt>
            <dd class="col-sm-8">#<span id="row-status-{{$solicitud->id}}">{{$solicitud->proyecto->procesoCurrent->first()->nombre_proceso}}</span></dd>
            <dt class="col-sm-4">Categoria:</dt>
            <dd class="col-sm-8">{{$solicitud->categoria->tipo_solicitud}}</dd>

            <dt class="col-sm-4">Solicitante:</dt>
            <dd class="col-sm-8">
                @if ($solicitud->solicitante->razon_social)
                {{$solicitud->solicitante->razon_social}}
                @else
                {{$solicitud->solicitante->nombre}} {{$solicitud->solicitante->apellido}}
                @endif
            </dd>

            <dt class="col-sm-4">Descripcion</dt>
            <dd class="col-sm-8">
                {{$solicitud->descripcion}}
            </dd>

            <dt class="col-sm-4">Archivo</dt>
        <dd class="col-sm-8">@if($solicitud->archivo) <a target="_blank" href="{{asset('documentos/solicitudes/')}}/{{$solicitud->id.'/'.$solicitud->archivo}}">PDF</a> @else No se cargo archivo @endif</dd>
        </dl>

        
        @if (count($solicitud->clausuras)==0)
        <button type="button" id="btn_show_send2-{{$solicitud->id}}" class="btn btn-primary btn-sm" onclick="enviarRecepcion(this);" data-href="{{route('solicitud.recepcion', $solicitud->id)}}" data-toggle="tooltip" data-placement="top" title="ENVIAR A RECEPCION">RECEPCION</button>

        <button type="button" id="btn_show_send2-{{$solicitud->id}}" class="btn btn-info btn-sm" onclick="sendManagement(this);" data-href="{{route('solicitud.management', $solicitud->id)}}" data-toggle="tooltip" data-placement="top" title="ENVIAR A GERENCIA">GERENCIA</button>
      <button type="button" id="btn_show_send6-{{$solicitud->id}}" class="btn btn-default btn-sm" onclick="enviarAsistente(this);" data-href="{{route('solicitud.asistente', $solicitud->id)}}" data-toggle="tooltip" data-placement="top" title="ENVIAR A ASISTENTE">ASISTENTE</button>

        <button type="button" id="btn_show_send-{{$solicitud->id}}" class="btn btn-success btn-sm" onclick="enviarJuridica(this);" data-href="{{route('solicitud.juridica', $solicitud->id)}}" data-toggle="tooltip" data-placement="top" title="ENVIAR A JURIDICA">JURIDICA</i></button>
        
        <button type="button" id="btn_show_send-{{$solicitud->id}}" class="btn btn-warning btn-sm" onclick="enviarProyectos(this);" data-href="{{route('solicitud.proyectos', $solicitud->id)}}" data-toggle="tooltip" data-placement="top" title="ENVIAR A PROYECTOS">PROYECTOS</i></button>
        @endif


      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<div class="col-md-12 col-sm-12">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">
        <i class="fas fa-text-width"></i>
        Anexos:
      </h3>
      <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="table-responsive">
          <table class="table table-hover table-sm mejoratb">
              <thead class="thead-light">
                  <tr>
                      <th>#</th>
                      <th>Documento</th>
                      <th>Archivo</th>                       
                  </tr>
              </thead>
              <tbody>

                @forelse ($anexos as $anexo)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$anexo->documento->tipo_documento}}</td>
                  <td>
                    <a target="_blank" href="{{ asset('/documentos/anexos/'.$anexo->solicitud_id.'/'.$anexo->name) }}"
                      class="btn btn-primary btn-sm"> <i class="fa fa-eye"></i></a>
                  </td>                   
               </tr>
                @empty
                    <tr>
                      <td colspan="3"><center>No existen anexos </center></td>
                    </tr>
                @endforelse                  
              </tbody>
          </table>
      </div>

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>

<div class="col-md-12 col-sm-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          <i class="fas fa-text-width"></i>
          Poblacion Afectada:
        </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
          </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">

        <div class="table-responsive">
            <table class="table table-hover table-sm mejoratb">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Categoria</th>
                        <th>Poblacion</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($solicitud->poblaciones as $poblacion)
                     <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$poblacion->clasificacion->tipo_poblacion}}</td>
                        <td>{{$poblacion->detalle}}</td>
                        <td>{{$poblacion->pivot->numero_persona}}</td>
                     </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>



<div class="col-md-12 col-sm-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          <i class="fas fa-text-width"></i>
          Presupuestos:
        </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
          </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-sm mejoratb">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>                      
                        <th>Recurso Municipio</th>
                        <th>Fondo Mixto</th>
                        <th>Ingreso Cultura</th>
                        <th>Ingreso Propio</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($solicitud->proyecto->presupuestos as $presupuesto)
                     <tr>
                        <td class="text-center">{{$loop->iteration}}</td>                      
                        <td class="text-center">${{number_format($presupuesto->recurso_municipio, 0)}}</td>
                        <td class="text-center">${{number_format($presupuesto->fondo_mixto, 0)}}</td>
                        <td class="text-center">${{number_format($presupuesto->ministerio_cultura, 0)}}</td>
                        <td class="text-center">${{number_format($presupuesto->ingreso_propio, 0)}}</td>
                     </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>




  


@endif
<div class="card">
  <div class="card-header">
    <h3 class="card-title">
      <i class="fas fa-text-width"></i>
      Historial:
    </h3>
    <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
      </div>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-hover table-sm mejoratb">
          <thead class="thead-light">
              <tr>
                  <th>#</th>
                  <th>Observación</th>                    
                  <th>Fecha</th>                    
              </tr>
          </thead>
          <tbody>
              @foreach ($historials as $h)
               <tr>
                  <td class="text-center">{{$loop->iteration}}</td>
                  <td class="text-center">{{ $h->descripcion }}</td>
                  <td class="text-center">{{ $h->created_at }}</td>
               </tr>
              @endforeach
          </tbody>
      </table>
  </div>
  </div>
</div>

