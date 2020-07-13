@extends('layouts.main')
@section('titulo', "Reporte de Proyectos")
@section('extra-css')
<!-- DataTables -->
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
<small>Porutectos por Línea:</small>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
      </div>
    </div>
    <div class="card-body table-responsive" id="id_table">
      <form action="{{ route('reporte.linea') }}" method="POST" target="_blank">
        @csrf
        <div class="row">
            <div class="col-sm-12">
                <label for="">Líneas:</label>
                <select name="linea" id="linea" class="form-control" required>
                    @foreach ($lineas  as $linea)
                    <option value="{{$linea->id}}">{{$linea->descripcion}}</option>
                    @endforeach
                </select>
            </div>          
            
            </div>
            <br>

        <button type="submit" class="btn btn-info"> <i class="fa fa-search"></i> BUSCAR</button> 
      </form>   
    </div>
    <!-- /fin tabla-->
    
  </div>
  <div class="card card" style="background:#EBF5FB">
    <div class="card-header">
      <small>Solicitudes Por Fecha:</small>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
      </div>
    </div>
    <div class="card-body table-responsive" id="id_table">
      <form action="{{ route('reporte.fechas') }}" method="POST" target="_blank">
        @csrf
        <div class="row">
            <div class="col-sm-6">
                <label for="">Fecha Inicio :</label>
                <input type="date" name="fecha1" class="form-control">
            </div>
            <div class="col-sm-6">
                <label for="">Fecha Final:</label>
                <input type="date" name="fecha2" class="form-control">
            </div>           
            </div>
            <br>
        <button type="submit" class="btn btn-info"> <i class="fa fa-search"></i> BUSCAR</button> 
      </form>   
    </div>
    <!-- /fin tabla-->
   
  </div>

  <div class="card card" style="background:#EBF5FB">
    <div class="card-header">
      <small>Solicitudes rango de fecha e indicador:</small>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
      </div>
    </div>
    <div class="card-body table-responsive" id="id_table">
      <form action="{{ route('reporte.fechas-indicador') }}" method="POST" target="_blank">
        @csrf
        <div class="row">
          <div class="col-sm-6">
            <label for="">Indicador :</label>
            <select name="indicador_id" id="indicador_id" class="form-control">
              @foreach ($indicadores as $item)
                  <option value="{{ $item->id }}">{{ $item->nombre_indicador }}</option>
              @endforeach
            </select>
        </div>
            <div class="col-sm-6">
                <label for="">Fecha Inicio :</label>
                <input type="date" name="fecha1" class="form-control">
            </div>
            <div class="col-sm-6">
                <label for="">Fecha Final:</label>
                <input type="date" name="fecha2" class="form-control">
            </div>           
            </div>
            <br>
        <button type="submit" class="btn btn-info"> <i class="fa fa-search"></i> BUSCAR</button> 
      </form>   
    </div>
    <!-- /fin tabla-->
   
  </div>

</div>

</div>


@endsection

@section('extra-script')
<!-- DataTables -->

<!-- SweetAlert2 -->
<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!--data tables y js de documentos--->

@stop





