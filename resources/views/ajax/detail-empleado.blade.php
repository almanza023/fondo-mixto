<div class="col-md-12 col-sm-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          <i class="fas fa-text-width"></i>
          Informacion detallada:
        </h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <dl class="row">
            <dt class="col-sm-4">Nombre:</dt>
            <dd class="col-sm-8">{{$empleado->name_complete}} ({{$empleado->nid}}).</dd>

            <dt class="col-sm-4">Contacto:</dt>
            <dd class="col-sm-8">{{$empleado->email}} ({{$empleado->celular}}) </dd>

            
            <dd class="col-sm-8">
                (¿Jefe?:  
                @if($empleado->is_jefe)
                    <span class="badge bg-gradient-primary sm">SI</span>
                @else
                    <span class="badge bg-gradient-danger sm">NO</span>
                @endif
                ).
            </dd>

            <dt class="col-sm-8">Correo</dt>
            <dd class="col-sm-8">{{$empleado->user->email}} </dd>
        </dl>

      </div>
      <!-- /.card-body -->
    </div>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          <i class="fas fa-text-width"></i>
          Informacion de Ingreso a Sistema:
        </h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <dl class="row">
            <dt class="col-sm-4">Usuario:</dt>
            <dd class="col-sm-8">{{$empleado->user->documento}}<dd>

           
            </dd>

            <dt class="col-sm-4">Rol</dt>
            @foreach ($empleado->user->roles as $item)
            <dd class="col-sm-8">{{ $item->name  }} </dd>
            @endforeach
           

        </dl>

      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>