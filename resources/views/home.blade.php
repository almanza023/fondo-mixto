@extends('layouts.main')
@section('titulo', "Inicio")
@section('link')

@endsection
@section('content')
<div class="row row-xs mg-t-10">
<div class="container-fluid">
  <div class="col-lg-12 mg-t-10 mg-lg-t-0">
    <div class="card card-table">
      <div class="card-header">
        <h6 class="slim-card-title"></h6>
      </div> 
      <div class="col-md-12">
        <center>
          <img src="{{ asset('img/fondomi.png') }}" alt="" width="500px" height="200px">
          <h2>SISTEMA DE PROCESOS CULTURALES</h2>
        </center>
      </div>
    
    </div><!-- card -->
  </div><!-- col-6 -->
</div>
</div>
@if(auth()->user()->hasRole('administrador') || auth()->user()->hasRole('director-administrativo'))

  
  <div class="row row-xs mg-t-10">
    <div class="col-lg-6">
      <div class="card card-table">
        <div class="card-header">
          <h6 class="slim-card-title">ESTADISTICAS</h6>
        </div><!-- card-header -->
       <div class="col-md-6" id="estados">
        <div  style="width: 450px; height: 250px;"></div>
       </div>
       
      </div><!-- card -->
    </div><!-- col-6 -->

     <div class="col-lg-6 mg-t-10 mg-lg-t-0">
      <div class="card card-table">
        <div class="card-header">
          <h6 class="slim-card-title">ESTADISTICAS</h6>
        </div> 
        <div class="col-md-6">
          <div id="categorias" style="width: 450px; height: 250px;"></div>
        </div>
      
      </div><!-- card -->
    </div><!-- col-6 -->
  </div>
  @endif



</div>
@endsection
@section('extra-script')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load("current", {packages:['corechart']});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ["DEPENDENCIA", "CANTIDAD", { role: "style" } ],
      ["RECEPCIÓN", <?php echo $rec;?>, "##E74C3C"],
      ["GERENCIA", <?php echo $ger;?>, "#b87333"],
      ["ASISTENTE ADMINISTRATIVO", <?php echo $asi;?>, "silver"],
      ["JURÍDICA", <?php echo $jur;?>, "gold"],
      ["DIRECTOR ADMINISTRATIVO", <?php echo $pro;?>, "#2ECC71"]
      
    ]);

    var view = new google.visualization.DataView(data);
    view.setColumns([0, 1,
                     { calc: "stringify",
                       sourceColumn: 1,
                       type: "string",
                       role: "annotation" },
                     2]);

    var options = {
      title: "SOLICITUDES POR DEPENDENCIA",
      width: 450,
      height: 250,
      bar: {groupWidth: "95%"},
      legend: { position: "none" },
    };
    var chart = new google.visualization.ColumnChart(document.getElementById("estados"));
    chart.draw(view, options);
}


</script>

<script type="text/javascript">
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['CATEGORIA', 'CANTIDAD'],
    
       ["PROYECTOS",     <?php echo $pro ?>],
       ["SOLICITUDES GENERALES",     <?php echo $dep ?>],
       ["SOLICITUDES PQRS",     <?php echo $apo ?>]
      
   
    ]);

    var options = {
      title: 'CANTIDAD DE SOLICITUDES POR CATEGORIA',
      width: 420,
      height: 200,
      is3D: true,
    };

    var chart = new google.visualization.PieChart(document.getElementById('categorias'));
    chart.draw(data, options);
  }
</script>
@endsection