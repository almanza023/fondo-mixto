@extends('layouts.main')
@section('titulo', "Anexos")
@section('extra-css')
<!-- SweetAlert2 -->

<!-- icheck bootstrap -->
<link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
@stop
@section('link')
<div class="row mb-2">
  <div class="col-sm-12 text-center letra_titulo">
    <p>Anexos</p>
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
      <form id="form" action="{{ route('anexos.store') }}" method="POST" onkeypress="return disableEnterKey(event);" enctype="multipart/form-data">
        @csrf
        <table class="table table-bordered">
            <tr>
              <input type="hidden" name="solicitud_id" id="id">
                <th>Solicitud: </th>
                <td>
                  <select name="" id="solicitud_id" class="form-control js-example-basic-single">
                 
                  </select>
                </td>                
            </tr>           
            <tr>
              <th>Proponente:</th>
              <td> <span id="proponente"></span></td>
            </tr>
            <tr>
              <th>Tipo:</th>
              <td><span id="tipo"></span></td>
            </tr>
        </table>

        <div id="datos">
          <table class="table table-condensed">
               <tr
                 <td>
                   
                 </td>
               </tr>
               <tr>
                 <td><input type="file" class="form-control " name="archivo" id="archivo"></td>
               </tr>         

           <tr>
             <td>
               <button type="button" id="guardar" class="btn btn-success" ><i class="fa fa-save"></i> GUARDAR</button>
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


<!-- SweetAlert2 -->
<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!--data tables y js de documentos--->

<script src="{{asset('js/anexos.js')}}"></script>


@stop



