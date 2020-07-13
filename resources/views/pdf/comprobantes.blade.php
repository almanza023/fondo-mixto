
<!DOCTYPE html>
<html lang="en">
<head>   
    <title>Reporte de Proyectos Filtro de Fechas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
   
    <div class="header">
        <center><img src="{{ asset('img/fondomi.png') }}"></center>
    </div>

 <table class="table table-bordered" >
    <tr>
     
      <th colspan="4">COMPROBANTE DE EGRESO N° {{ $c->id }}</th>
     
    </tr>
    <tr>
      <th>BANCO</th>
      <th>CHEQUE N°</th>
      <th>C.C NIT BENEFICIARIO</th>
      <th>FECHA</th>
    </tr>
    <tr>
      
      <td>{{ $c->banco }}</td>              
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
        $ {{ number_format($c->valor, 0) }}
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
  <tr>
      <td colspan="4">{{ $letra }}</td>
  </tr>
 
</tr>   
  </table>

</body>
</html>