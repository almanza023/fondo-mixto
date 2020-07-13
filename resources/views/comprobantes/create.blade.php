@extends('layouts.main')
@section('titulo', "Comprobantes")
@section('extra-css')
<!-- SweetAlert2 -->
<!-- icheck bootstrap -->
<link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
@stop
@section('link')
<div class="row mb-2">
  <div class="col-sm-12 text-center letra_titulo">
    <p>Comprobantes</p>
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
      <form id="form_create" action="{{ route('comprobantes.store') }}" method="POST" onkeypress="return disableEnterKey(event);" enctype="multipart/form-data">
        @csrf
        <table class="table table-bordered">
          <input type="hidden" name="solicitud_id" id="id">
            <tr>           
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
          <table class="table table-condensed table-responsive" style="width: 100%;">
            <tr>
              <td>
                
              </td>
              <th>COMPROBANTE DE EGRESO N°</th>
              <td></td>
            </tr>
            <tr>
              <th>BANCO</th>
              <th>CHEQUE N°</th>
              <th>C.C NIT BENEFICIARIO</th>
              <th>FECHA</th>
            </tr>
            <tr>
              
              <td><input type="text" class="form-control" id="banco" name="banco"></td>              
              <td><input type="text" class="form-control" id="cheque" name="cheque"></td>
              <td><input type="text" class="form-control" id="nit" name="nit"></td>
              <td><input type="date" class="form-control" id="fecha" name="fecha"></td>
            </tr>
            <tr>
              <th colspan="3">CONCEPTO</th>
              <th>VALOR</th>
            </tr>
            <tr>
              <td colspan="3">
                <textarea name="concepto" id="concepto" style="width: 100%;"></textarea>
              </td>
              <td>
                <input type="number" class="form-control" id="valor" name="valor">
              </td>
            </tr>
            
            <tr>
              <th colspan="2">MENOS RETEFUENTE POR SERVICIO</th>
              <td style="width: 10%;">   
                <input type="number" class="form-control porcentaje" id="por_servicio" name="por_servicio">%</td>

              <td>   <input type="number" class="form-control lect" id="ret_servicio" name="ret_servicio"></td>
            </tr>
            <tr>
              <th colspan="2">MENOS RETEFUENTE POR COMPRA</th>
              <td style="width: 10%;">   <input type="number" class="form-control porcentaje" id="por_compra" name="por_compra">%</td>
              <td>   <input type="number" class="form-control lect" id="ret_compra" name="ret_compra"></td>
            </tr>
            <tr>
              <th colspan="2">ADMINISTRACIÓN Y PAPELERIA</th>
              <td style="width: 10%;">   <input type="number" class="form-control porcentaje" id="por_papeleria" name="por_papeleria">%</td>
              <td>   <input type="number" class="form-control lect" id="admin_papeleria" name="admin_papeleria"></td>
            </tr>
            <tr>
              <th colspan="2">MENOS DEDUCCIONES Y DESCUENTOS</th>
              <td style="width: 5%;">   <input type="number" class="form-control porcentaje" id="por_descuento" name="por_descuento"> %</td>
              <td>   <input type="number" class="form-control lect" id="descuentos" name="descuentos"></td>
            </tr>
            <tr>
            <th colspan="2">SUBTOTAL</th>
            <td colspan="2">   <input type="number" class="form-control lect" id="subtotal" name="subtotal"></td>
          </tr>
          <tr>
            <th colspan="2">IVA</th>
            <td style="width: 5%;">   <input type="number" class="form-control porcentaje" id="por_iva" name="por_iva"> %</td>
            <td >   <input type="number" class="form-control lect" id="iva" name="iva"></td>
          </tr>
          <tr>
            <th colspan="2">TOTAL</th>
            <td colspan="2">   <input type="number" class="form-control lect" id="total" name="total"></td>
          </tr>
         
        </tr>
            <tr>
              

             <td>
               <button type="button" id="guardar" class="btn btn-success" ><i class="fa fa-save"></i> GUARDAR</button>
             </td>
           </tr>
          </table>
        </div>
      </form>
       


    </div>    <!-- /fin tabla-->
   
  </div>
</div>
@endsection

@section('extra-script')

<!-- DataTables -->


<!-- SweetAlert2 -->
<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!--data tables y js de documentos--->

<script src="{{asset('js/comprobante.js')}}"></script>


@stop



