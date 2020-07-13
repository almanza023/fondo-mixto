@extends('layouts.main')
@section('titulo', "Reporte de Proyectos")
@section('extra-css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<!-- SweetAlert2 -->
<link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
@stop

@section('link')
<div class="row mb-2">
  <div class="col-sm-12 text-center letra_titulo">
    <p>Reporte de Proyectos</p>
  </div>
</div>
@endsection

@section('content')
<div class="container-fluid">
  
  <div class="card card" style="background:#EBF5FB">
    <div class="card-header">
<small></small>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
      </div>
    </div>
    <div class="card-body table-responsive" id="id_table">
      <form action="{{ route('reporte.filter') }}" method="POST" target="_blanck">
        @csrf
        <div class="row">
            <div class="col-sm-6">
                <label for="">Fecha Inicio :</label>
                <input type="date" name="date1" class="form-control">
            </div>
            <div class="col-sm-6">
                <label for="">Fecha Final:</label>
                <input type="date" name="date2" class="form-control">
            </div>           
            </div>
            <br>
        <button type="submit" class="btn btn-info"> <i class="fa fa-search"></i> BUSCAR</button> 
      </form>   
    </div>
    <!-- /fin tabla-->
   
  </div>
  



</div>




@endsection

@section('extra-script')
<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<!-- SweetAlert2 -->
<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!--data tables y js de documentos--->
<script src="{{asset('js/datatable.js')}}"></script>
<script src="{{asset('js/reporte.js')}}"></script>

@stop





