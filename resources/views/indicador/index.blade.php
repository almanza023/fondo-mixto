@extends('layouts.main')


@section('titulo', "Indicadores")

@section('extra-css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<!-- SweetAlert2 -->
<link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
@stop


@section('link')

<div class="row mb-2">
  <div class="col-sm-12 text-center letra_titulo">
    <p>Modulo de Indicadores</p>
  </div>
</div>

@endsection
@section('content')
<div class="container-fluid">

  <div class="card card" style="background:#EBF5FB">
    <div class="card-header">
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalCreate">Crear Indicadores <i class="fas fa-user-plus"></i></button>
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalCreate2">Meta Por  Indicador <i class="fas fa-user-plus"></i></button>
            <!----Modals-->

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
      </div>
    </div>
    <!-- /tabla -->
    <div class="card-body table-responsive" id="id_table">

        @include('ajax.table-indicadores')

    </div>
    <!-- /fin tabla-->
    <div class="card-footer">
      Listado de los Indicadores.
    </div>
  </div>
</div>
<form id="form_hidden" style="display:none" action="{{route('indicadores.index')}}" method="GET"><input type="hidden" name="opcion" value="ok"></form>
@include('modals.create-indicador')
@include('modals.edit-indicador')
@include('modals.create-indicador-meta')

@endsection

@section('extra-script')

<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<!-- SweetAlert2 -->
<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!--data tables y js de documentos--->
<script src="{{asset('js/datatable.js')}}"></script>
<script src="{{asset('js/indicador.js')}}"></script>


@stop



