@extends('layouts.main')
@section('titulo', "Solicitud")

@section('extra-css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<!-- SweetAlert2 -->
<link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">

@stop

@section('link')
<div class="row mb-2">
  <div class="col-sm-12 text-center letra_titulo">
    <p>Detalles Generales de Solicitud</p>
  </div>
</div>

@endsection

@section('content')
<div class="container-fluid">


  @if($solicitud->categoria->tipo_solicitud=='Proyecto')
<div class="card card">
    <div class="card-header">
       <h4>ACTIVIDADES</h4>
       @if(count($solicitud->clausuras)==0)
       <button type="button" class="btn btn-success  show-details" data-toggle="modal" data-target="#modalActividades" data-id="{{ $solicitud->proyecto->id }}"><i class="fas fa-paper-plane" ></i> AGREGAR ACTIVIDADES</button>
      @endif
       <div class="card-tools">
       
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
       
        
      </div>
    </div>
    <!-- /tabla -->
    <div class="card-body table-responsive" id="id_table">

        <div id="table-actividades">
            @include('ajax.table-actividades')
        </div>
    </div>
</div>

    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          <i class="fas fa-text-width"></i>
          Presupuestos:
        </h3><br>
        @if(count($solicitud->clausuras)==0)
        <button id="btn-presupuesto"  type="button" class="btn btn-success" data-toggle="modal" data-target="#modalPresupuesto">Añadir Presupuesto <i class="fas fa-hand-holding-usd"></i></button>

        @endif
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
          </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div class="table-responsive">
            @include('ajax.table-presupuesto')
        </div>

      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endif

    
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-text-width"></i>
              Anexos:
            </h3><br>
            @if(count($solicitud->clausuras)==0)
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalAnexos" data-id="{{ $solicitud->id }}"><i class="fas fa-paper-plane"></i>AGREGAR ANEXOS</button>
            @endif
            

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="table-responsive">
                @include('ajax.table-anexos-edit')
            </div>
      
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-text-width"></i>
              Clausura:
            </h3><br>
                <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="table-responsive">
                @include('ajax.table-clausura')
            </div>
            @if(count($solicitud->clausuras)==0)
            <form id="form_clausura" action="{{ route('store.clausura') }}" method="POST">
              @csrf
              <input type="hidden" name="solicitud_id" value="{{ $solicitud->id }}" id="solicitud_id_clausura">
              <div class="form-row">
                <label for="">Motivo</label>
                <textarea name="motivo" id="motivo" style="width: 100%;"></textarea>
              </div>
              <div class="form-group">
                <br>
                <button type="button" id="add-clausura" class="btn btn-success"> <i class="fas fa-save"></i> GUARDAR</button>
              </div>
            </form>
            @endif
      
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
        @include('modals.add-anexos-edit')
        @if($solicitud->categoria->tipo_solicitud=='Proyecto')
        @include('modals.actividades-edit')
        @include('modals.presupuesto')
        
        @endif
    


      </div>

 {{--@include('modals.edit-solicitante')--}}
@endsection


@section('extra-script')
<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<!-- SweetAlert2 -->
<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>

<!--Data tables y script de lineas-->
<script src="{{asset('js/all-datatable.js')}}"></script>
<script src="{{asset('js/all-solicitud.js')}}"></script>


@stop


