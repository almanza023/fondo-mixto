
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
    <button type="button"  id="btn_show_send-{{$solicitud->id}}"
      class="btn btn-success btn-sm" onclick="enviarJuridica(this);"
      data-href="{{route('solicitud.juridica', $solicitud->id)}}"
      data-toggle="tooltip" data-placement="top" title="ENVIAR A JURIDICA">
      <i class="fas fa-share-square"></i>
  </button>
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
            <dt class="col-sm-4">Fecha Registro</dt>
            <dd class="col-sm-8">
                {{$solicitud->fecha}}
            </dd>

            <dt class="col-sm-4">Archivo</dt>
        <dd class="col-sm-8">@if($solicitud->archivo) <a target="_blank" href="{{asset('documentos/solicitudes/')}}/{{$solicitud->id.'/'.$solicitud->archivo}}">PDF</a> @else No se cargo archivo @endif</dd>
        </dl>

       

        <button type="button"  id="btn_show_send-{{$solicitud->id}}" class="btn btn-info btn-sm" onclick="enviarJuridica(this);" data-href="{{route('solicitud.juridica', $solicitud->id)}}" data-toggle="tooltip" data-placement="top" title="ENVIAR A JURIDICA"><i class="fas fa-share-square"></i></button>



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
          Proyecto:
        </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
          </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <dl class="row">
            <dt class="col-sm-4">Titulo:</dt>
            <dd class="col-sm-8">{{$solicitud->proyecto->titulo}}</dd>

            <dt class="col-sm-4">Fechas de Realizacion:</dt>
            <dd class="col-sm-8">
                Fecha Inicio: {{$solicitud->proyecto->fecha_inicio}} -
                Fecha Final: {{$solicitud->proyecto->fecha_final}}
            </dd>

            <dt class="col-sm-4">Descripcion</dt>
            <dd class="col-sm-8">
                {{$solicitud->proyecto->descripcion}}
            </dd>

        </dl>

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
        Historial:
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
                      <th>Descripción</th>
                      <th>Fecha</th>                     
                  </tr>
              </thead>
              <tbody>
                  @foreach ($historials as $h)
                   <tr>
                      <td class="text-center">{{$loop->iteration}}</td>
                      <td class="text-center">{{ $h->descripcion}}</td>
                      <td class="text-center">{{ $h->created_at}}</td>                     
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

