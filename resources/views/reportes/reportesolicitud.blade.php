@extends('layouts.main')


@section('titulo', "Reporte de Solicitudes")

@section('extra-css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<!-- SweetAlert2 -->
<link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
@stop

@section('link')

<div class="row mb-2">
  <div class="col-sm-12 text-center letra_titulo">
    <p>Reporte de Solicitudes</p>
  </div>
</div>

@endsection

@section('content')
<div class="container-fluid">
  <div class="card card" style="background:#EBF5FB">
    <div class="card-header">
<small>
    Filtros por:
</small>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
      </div>
    </div>
    <div class="card-body table-responsive" id="id_table">
        <div class="row">
            <div class="col-sm-2">
                <label for="">Tipo de Solicitud:</label>
                <select name="tipo_solicitud" id="tipo_solicitud" class="form-control">
                   @foreach ($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->tipo_solicitud}}</option>

                   @endforeach
                </select>
            </div>
            <div class="col-sm-2">
                <label for="">Fecha de creación:</label>
                <input type="date" class="form-control">
            </div>
            <div class="col-sm-2">
                <label for="">Estado:</label>
                <select name="nombre_estado" id="nombre_estado" class="form-control">
                   @foreach ($estados as $estado)
                    <option value="{{$estado->id}}">{{$estado->nombre_estado}}</option>
                   @endforeach
                </select>
            </div>
            <div class="col-sm-4">
                <label for="">Indicadores:</label>
                <select name="nombre_indicador" id="nombre_indicador" class="form-control">
                    @foreach ($indicadores as $indicador)
                    <option value="{{$indicador->id}}">{{$indicador->nombre_indicador}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-2">
                <label for="">Radicados:</label>
                <select name="radicado" id="radicado" class="form-control">
                    <option value="">Entrada</option>
                    <option value="">Salida</option>
                </select>
            </div>
            </div>
            <br>
            <br>
            <br>
            <!-- /tabla -->
    @include('ajax.table-reportesolicitud')
    </div>
    <!-- /fin tabla-->
    <div class="card-footer">
      Listado de los reportes.
    </div>
  </div>
</div>
<form id="form_hidden" style="display:none" action="{{route('indicadores.index')}}" method="GET"><input type="hidden" name="opcion" value="ok"></form>
@endsection

@section('extra-script')
<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<!-- SweetAlert2 -->
<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!--data tables y js de documentos--->
<script src="{{asset('js/datatable.js')}}"></script>
@stop




