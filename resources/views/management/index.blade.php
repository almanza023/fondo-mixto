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

@stop

@section('link')

<div class="row mb-2">
  <div class="col-sm-12 text-center letra_titulo">
    <p>Solicitudes-Gerencia</p>
  </div>
</div>

@endsection

@section('content')
<div class="container-fluid">

  <div class="card card" style="background:#EBF5FB">
    <div class="card-header">
            <!----Modals-->
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
      </div>
    </div>
    <!-- /tabla -->
    <div class="card-body table-responsive" id="id_table">
        @include('ajax.table-solicitudes-management')
    </div>
    <!-- /fin tabla-->
    
  </div>
</div>

@include('modals.show-solicitud')
@include('modals.add-indicadores')
{{-- @include('modals.actividades') --}}
@include('modals.observaciones')


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
<script src="{{asset('js/management.js')}}"></script>
<script src="{{asset('js/movimientos.js')}}"></script>
@include('layouts.botones')
@stop


