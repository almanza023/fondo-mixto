@extends('layouts.main')


@section('titulo', "Tipo de población")

@section('extra-css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<!-- SweetAlert2 -->
<link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
@stop

@section('link')

<div class="row mb-2">
  <div class="col-sm-12 text-center letra_titulo">
    <p> Modulo Tipo de Población</p>
  </div>
</div>

@endsection

@section('content')
<div class="container-fluid">

  <div class="card card" style="background:#EBF5FB">
    <div class="card-header">
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalCreate">Crear Tipo de población <i class="fas fa-user-plus"></i></button>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
      </div>
    </div>
    <!-- /tabla -->
      <!-- /tabla -->
      <div class="card-body table-responsive" id="id_table">

        @include('ajax.table-tipodepoblacion')
    </div>

    <!-- /fin tabla-->
    <div class="card-footer">
      Lista de los tipos de proponentes.
    </div>
  </div>
</div>
<form id="form_hidden" style="display:none" action="{{route('tipopoblacion.index')}}" method="GET"><input type="hidden" name="opcion" value="ok"></form>
@include('modals.create-tipopoblacion')
@include('modals.edit-tipopoblacion')
@endsection

@section('extra-script')

<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<!-- SweetAlert2 -->
<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!--Script Datatables y js de tipopoblacion--->
<script src="{{asset('js/datatable.js')}}"></script>
<script src="{{asset('js/tipodepoblacion.js')}}"></script>


@stop

