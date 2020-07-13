
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Fondo  | Mixto</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/estilo.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="body_login">
    <div class="container" id="container">
        <div class="form-container sign-in-container">
                <form id="formlogin"  action="{{ route('login') }}" method="POST">
                    @csrf

                    <h1>Fondo Mixto</h1>
                    <div class="social-container">
                        <img src="{{asset('/img/logo1.jpg')}}" >
                    </div>
                    <h5>Ingresa tus credenciales</h5>

                    <div class="input-group mb-3">
                      <input id="documento" type="number" class="form-control @error('documento') is-invalid @enderror" name="documento" value="{{ old('documento') }}" required autocomplete="email" autofocus placeholder="Usuario">

                      @error('email')
                      <span id="exampleInputEmail1-error" class="error invalid-feedback">{{ $message }}</span>
                      @enderror
                    </div>

                    <div class="input-group mb-3">
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Contraseña">

                      @error('email')
                      <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="row">

                      <div class="col-md-12">
                        <button style="float:center" type="submit"   autofocus >Ingresar</button>

                      </div>

                    </div>

                </form>

        </div>

        <div class="overlay-container">
            <div class="overlay">
                 <div class="overlay-panel overlay-right">
                    {{-- -
                    <button class="ghost" id="signUp">Register</button>
                    --}}
                </div>
            </div>
        </div>
    </div>

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('js/adminlte.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('js/login.js')}}"></script>

</body>
</html>












