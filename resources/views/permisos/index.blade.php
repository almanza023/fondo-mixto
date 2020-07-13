@extends('layouts.main')
@section('titulo', 'PERMISOS')
@section('extra-css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<!-- SweetAlert2 -->
<link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">

<!--select-->
<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@stop
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-warning">
                    Permisos                
                </div>
                <div class="card-body">
                    <a href="{{route('permisos.create')}}" class="btn btn-lg btn-primary "><i class="fa fa-save"></i> Crear</a>
                    <div class="table-responsive">
                        <br>
                        <table class="table table-hover " id="tabla" >
                            <thead>
                                <tr>
                                    <th >ID</th>
                                    <th>NOMBRE</th>
                                    <th>DESCRIPCIÓN</th>
                                    <th >ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($permissions as $permission)
                                <tr>
                                    <td>{{$permission->id}}</td>
                                    <td>{{$permission->name}}</td>
                                    <td>{{$permission->description}}</td>
                                    <td width="10px">

                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              Opciones
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a href="{{route('permisos.show', $permission->id)}}" class="dropdown-item">
                                                    <i class="fa fa-eye"> </i> Ver
                                                </a>
                                                
                                                <a href="{{route('permisos.edit', $permission)}}" class="dropdown-item">
                                                    <i class="fa fa-edit"> </i> Editar
                                                </a>                                         
                                             
                                                {!! Form::open(['route' => ['permisos.destroy', $permission], 'method' =>'DELETE']) !!}
                                                    <button type="" class="dropdown-item">
                                                        <i class="fa fa-close"> </i> Eliminar
                                                    </button>
                                                {!! Form::close() !!}                                   
                                            </div>
                                          </div>                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                      
                    </div>
              </div>
          </div>
      </div>
  </div>
</div>
@stop
@section('extra-scripts')
<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<!-- SweetAlert2 -->
<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>

<!---select-->
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>


<!--Data tables y script de lineas-->
<script src="{{asset('js/datatable.js')}}"></script>
@if (session()->has('success'))
<script type="text/javascript">
	success('{{ session('success') }}');
</script>
@endif
@if (session()->has('warning'))
<script type="text/javascript">
	warning('{{ session('warning') }}');
</script>
@endif
@stop



