@extends('layouts.main')


@section('titulo', "Solicitudes")

@section('extra-css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<!-- SweetAlert2 -->
<link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
 <!--select-->
 <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
 <link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
 <link rel="stylesheet" href="{{asset('css/tooltip.css')}}">
 <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/dataTables.bootstrap4.min.css"/>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/buttons/1.3.1/css/buttons.bootstrap4.min.css"/>

@stop

@section('link')

<div class="row mb-2">
  <div class="col-sm-12 text-center letra_titulo">
    <p>Módulo de Solicitudes</p>
  </div>
</div>

@endsection

@section('content')
<div class="container-fluid">

  <div class="card card" style="background:#EBF5FB">
    <div class="card-header">
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalCreate">Añadir Solicitud <i class="fas fa-file-alt nav-icon"></i></button>
      <button id="btn-formato" style="display:none;" type="button" class="btn btn-success" data-toggle="modal" data-target="#modalFormato">Añadir Formato <i class="fas fa-file nav-icon"></i></button>
      <button id="btn-poblacion" style="display:none;" type="button" class="btn btn-success" data-toggle="modal" data-target="#modalPoblacion">Añadir Población <i class="fas fa-users"></i></button>
      {{-- <button id="btn-actividades" style="display:none;" type="button" class="btn btn-success" data-toggle="modal" data-target="#modalActividades">Añadir Actividades <i class="fas fa-network-wired"></i></button> --}}
      <button id="btn-presupuesto" style="display:none;" type="button" class="btn btn-success" data-toggle="modal" data-target="#modalPresupuesto">Añadir Presupuesto <i class="fas fa-hand-holding-usd"></i></button>
      <form id="form_create" action="{{route('solicitud.store')}}" method="POST" onkeypress="return disableEnterKey(event);" enctype="multipart/form-data">
        @csrf
       <input type="hidden" name="form_solicitud" id="form_solicitud" value="0">
       <input type="hidden" name="form_formato" id="form_formato" value="0">
       <input type="hidden" name="form_poblacion" id="form_poblacion" value="0">
       <input type="hidden" name="form_actividad" id="form_actividad" value="0">
       <input type="hidden" name="form_presupuesto" id="form_presupuesto" value="0">
       {{--<input type="hidden" name="form_documento" id="form_documento" value="0">--}}

        @include('modals.create-solicitudes')
        @include('modals.add-formato')
        @include('modals.add-poblacion')
        {{-- @include('modals.add-actividades') --}}
        @include('modals.add-presupuesto')
        {{--@include('modals.add-documentos')--}}

        <button id="btn-guardar-solicitud" style="display:none; margin-top:10px;"  type="submit" class="btn btn-primary btn-md">Guardar <i class="fas fa-save"></i></button>

      </form>

            <!----Modals-->
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
      </div>
    </div>
    <!-- /tabla -->
    <div class="card-body table-responsive" id="id_table">
        @include('ajax.table-solicitudes')
    </div>
    <!-- /fin tabla-->
    <div class="card-footer ">
      Listado de los solicitudes.
    </div>
  </div>
</div>
<form id="form_hidden" style="display:none" action="{{route('solicitud.index')}}" method="GET"><input type="hidden" name="opcion" value="ok"></form>


<input id="list_poblaciones" type="hidden" value='@json($poblaciones)'>
<input id="list_clasificaciones" type="hidden" value='@json($clasificaciones)'>
<input id="list_categorias" type="hidden" value='@json($categorias)'>

@include('modals.show-solicitud')



 {{--@include('modals.edit-solicitante')--}}
@endsection


@section('extra-script')
<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<!-- SweetAlert2 -->
<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!---select-->
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
<!--Data tables y script de lineas-->
<script src="{{asset('js/datatable.js')}}"></script>

<script>

  let poblaciones = $('#list_poblaciones').val();
  let clasificaciones = $('#list_clasificaciones').val();
  let categorias = $('#list_categorias').val();


  poblaciones = JSON.parse(poblaciones);
  clasificaciones = JSON.parse(clasificaciones);
  categorias = JSON.parse(categorias);

  let tr_poblacion = 0;
  let tr_actividad = 0;
  let tr_presupuesto = 0;
  let x_poblacion = 0;
  let x_actividad = 0;
  let x_presupuesto = 0;

</script>

<script src="{{asset('js/solicitud.js')}}"></script>
<script src="{{asset('js/movimientos.js')}}"></script>
 
@include('layouts.botones')
@stop


