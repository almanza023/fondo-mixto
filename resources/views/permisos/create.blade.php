@extends('layouts.main')
@section('titulo', "Permisos")
@section('extra-css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<!-- SweetAlert2 -->
<link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
@stop
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card ">
                <div class="card-header bg-warning">
                    Creación de Permisos
                </div>

                <div class="card-body">
                    {!! Form::open(['route' => 'permisos.store', 'id'=>'form_create']) !!}

                        @include('permisos.partials.form')

                    {!! Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('extra-script')
    <!-- DataTables -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <!-- SweetAlert2 -->
    <script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{ asset('js/permisos.js') }}"></script>
@endsection