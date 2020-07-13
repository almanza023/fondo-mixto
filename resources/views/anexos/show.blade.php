@extends('layouts.main')
@section('titulo', "Detalles de Anexos")
@section('extra-css')
<!-- SweetAlert2 -->
<link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
<!-- icheck bootstrap -->
<link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
@stop
@section('link')
<div class="row mb-2">
  <div class="col-sm-12 text-center letra_titulo">
    <p>Detalles de Anexos</p>
  </div>
</div>
@endsection

@section('content')
<div class="container-fluid">

  <div class="card card" style="background:#EBF5FB">
    <div class="card-header">
    <h3>Detalles de Anexos</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
      </div>
    </div>
    <!-- /tabla -->
    <div class="card-body table-responsive" id="id_table">
     <table class="table">
        <tr>
            <th>Documento</th>
            <th>Archivo</th>
        </tr>
        @forelse ($anexos as $anexo)
            <tr>
                <td>{{ $anexo->tipo_documento }}</td>
                <td>
                    
                    <a target="_blank" href="{{asset('documentos/solicitudes/'.$anexo->idsolicitud.'/'.$anexo->name)}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                    <a href="{{ route('anexos.edit', $anexo->idanexo) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="2"><center>No Existen Anexos</center></td>
            </tr>
        @endforelse
     </table>

  </div>
    <!-- /fin tabla-->
    <div class="card-footer">
      Anexos
    </div>
  </div>
</div>
@endsection
@section('extra-script')
<!-- SweetAlert2 -->
<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!--data tables y js de documentos--->
@stop



