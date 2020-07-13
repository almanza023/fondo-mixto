@extends('layouts.main')
@section('titulo', "Actualización Anexos")
@section('extra-css')
<!-- SweetAlert2 -->
<link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
<!-- icheck bootstrap -->
<link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@stop
@section('link')
<div class="row mb-2">
  <div class="col-sm-12 text-center letra_titulo">
    <p>Actualización Anexos</p>
  </div>
</div>
@endsection
@section('content')
<div class="container-fluid">
  <div class="card card" style="background:#EBF5FB">
    <div class="card-header">   

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus">
            </i></button>
      </div>
    </div>
    <!-- /tabla -->
    <div class="card-body table-responsive" id="id_table">
      <form id="form" action="{{ route('anexos.update', $anexo->id) }}" method="POST" onkeypress="return disableEnterKey(event);" enctype="multipart/form-data">
        @csrf
        @method('PUT')       
        <input type="hidden" name="solicitud_id" value="{{ $anexo->solicitud_id }}">
        <input type="hidden" name="documento_id" value="{{ $anexo->documento_id }}">
        <div id="datos">
          <table class="table table-condensed">   
              <tr>
                  <th>{{ $anexo->documento->tipo_documento }}</th>
                </tr>         
               <tr>
                 <td><input type="file" class="form-control " name="archivo" id="archivo"></td>
               </tr>         

           <tr>
             <td>
               <button type="button" id="actualizar" class="btn btn-success" ><i class="fa fa-save"></i> GUARDAR</button>
             </td>
           </tr>
          </table>
        </div>
      </form>
       


    </div>
    <!-- /fin tabla-->
    <div class="card-footer">
      Listado de los Empleados.
    </div>
  </div>
</div>
<form id="form_hidden" style="display:none" action="{{route('empleados.index')}}" method="GET"><input type="hidden" name="opcion" value="ok"></form>


@endsection

@section('extra-script')

<!-- DataTables -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<!-- SweetAlert2 -->
<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!--data tables y js de documentos--->

<script src="{{asset('js/anexos.js')}}"></script>


@stop



