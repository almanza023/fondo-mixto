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
        <div id="datos">
          <table class="table table-condensed table-responsive" style="width: 100%;">
            <tr>
              <td>
                
              </td>
              <th>COMPROBANTE DE EGRESO N° {{ $c->id }}</th>
              <td></td>
            </tr>
            <tr>
              <th>BANCO</th>
              <th>BENEFICIARIO</th>
              <th>CHEQUE N°</th>
              <th>C.C NIT BENEFICIARIO</th>
              <th>FECHA</th>
            </tr>
            <tr>
              
              <td>{{ $c->banco }}</td>                
              <td>{{ $c->beneficiario }}</td>                
              <td>{{ $c->cheque }}</td>
              <td>{{ $c->nit }}</td>
              <td>{{ $c->fecha }}</td>
            </tr>
            <tr>
              <th colspan="3">CONCEPTO</th>
              <th>VALOR</th>
            </tr>
            <tr>
              <td colspan="3">
                {{ $c->concepto }}
              </td>
              <td>
          {{ $c->valor }}
              </td>
            </tr>
            
            <tr>
              <th colspan="2">MENOS RETEFUENTE POR SERVICIO</th>
              <td style="width: 10%;">   
               {{ $c->por_servicio }}%</td>

              <td>   $ {{ number_format($c->ret_servicio, 0) }}</td>
            </tr>
            <tr>
              <th colspan="2">MENOS RETEFUENTE POR COMPRA</th>
              <td style="width: 10%;">   {{ $c->por_compra }}%</td>
              <td>  $ {{ number_format($c->ret_compra, 0) }}</td>
            </tr>
            <tr>
              <th colspan="2">ADMINISTRACIÓN Y PAPELERIA</th>
              <td style="width: 10%;">  {{ $c->por_papeleria }}%</td>
              <td>  $ {{ number_format($c->admin_papeleria, 0) }}</td>
            </tr>
            <tr>
              <th colspan="2">MENOS DEDUCCIONES Y DESCUENTOS</th>
              <td style="width: 5%;">   {{ $c->por_descuento }} %</td>
              <td>   $ {{ number_format($c->descuentos, 0) }}</td>
            </tr>
            <tr>
            <th colspan="2">SUBTOTAL</th>
            <td colspan="2">  $ {{ number_format($c->subtotal, 0) }}</td>
          </tr>
          <tr>
            <th colspan="2">IVA</th>
            <td style="width: 5%;">  {{ $c->por_iva }} %</td>
            <td > $ {{ number_format($c->iva, 0) }}</td>
          </tr>
          <tr>
            <th colspan="2">TOTAL</th>
            <td colspan="2">   $ {{ number_format($c->total, 0) }}</td>
          </tr>
         
        </tr>
            <tr>
              

             <td>
             <a  target="_blank" href="{{ route('reporte.comprobante', $c->id) }}" class="btn btn-primary"> <i class="fa fa-print"></i> IMPRIMIR</a>
             <a href="{{ route('comprobantes.edit', $c->id) }}" class="btn btn-warning"> <i class="fa fa-edit"></i> EDITAR</a>
             </td>
           </tr>
          </table>
        </div>
      </form>
       


    </div>
    <!-- /fin tabla-->
    
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



