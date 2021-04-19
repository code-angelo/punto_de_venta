<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <!-- <link rel="icon" type="image/png" href="images/icons/favicon.ico"/> -->
    <!--===============================================================================================-->
    <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->
    <!--===============================================================================================-->
    <!-- el sig para el checkbox -->
    <!-- <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"> -->
    <!--===============================================================================================-->
    <!-- <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css"> -->
    <!--===============================================================================================-->
    <!-- <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css"> -->
    <!--===============================================================================================-->
    <!-- <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css"> -->
    <!--===============================================================================================-->
    <!-- <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css"> -->
    <!--===============================================================================================-->
    <!-- <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css"> -->
    <!--===============================================================================================-->
    <!-- <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css"> -->
    <!--===============================================================================================-->
    <!-- <link rel="stylesheet" type="text/css" href="css/loginutil.css">
	<link rel="stylesheet" type="text/css" href="css/loginmain.css"> -->


    <link rel="stylesheet" href="{{ URL::asset('assets/css/loginutil.css')}}" media="screen">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/loginmain.css')}}" media="screen">

    <!--===============================================================================================-->
    <style>
        body {

            /* Ubicación de la imagen */
            background-image: url(assets/img/sno.jpg);
            opacity:0.9;
            /* Para dejar la imagen de fondo centrada, vertical y
            horizontalmente */
            background-position: center center;
            /* Para que la imagen de fondo no se repita */
            background-repeat: no-repeat;
            /* La imagen se fija en la ventana de visualización para que la altura de la imagen no supere a la del contenido */
            background-attachment: fixed;
            /* La imagen de fondo se reescala automáticamente con el cambio del ancho de ventana del navegador */
            background-size: cover;
            /* Se muestra un color de fondo mientras se está cargando la imagen
            de fondo o si hay problemas para cargarla */
            /* background-color: black; */
            /* background-image: linear-gradient(white, white, #827ffe); */
            }
    </style>
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-t-50 p-b-90">
                <form class="login100-form validate-form flex-sb flex-w" method="POST" action="{{ route('login') }}">
                    {{csrf_field()}}
                    <span class="login100-form-title p-b-51">
                        Punto de venta <br>
                        San José
                    </span>


                    <div class="wrap-input100 validate-input m-b-16" data-validate="Username is required">
                        <input id="email" type="email" class="input100 @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                            placeholder="E-mail">
                        <span class="focus-input100"></span>
                    </div>
                    


                    <div class="wrap-input100 validate-input m-b-16" data-validate="Password is required">
                        <input id="password" type="password"
                            class="input100 form-control @error('password') is-invalid @enderror" name="password"
                            required autocomplete="current-password" placeholder="Contraseña">
                        <span class="focus-input100" ></span>
                    </div>
                    <div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <p class="text-center">{{ $message }}</p>
                        </span>
                        <br>
                        @enderror
                    </div>
                    <div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <p class="text-center">{{ $message }}</p>
                        </span>
                        <br>
                        @enderror
                    </div>

					<!-- Falta implementar las funciones del checkbox. revisar login orig  -->

                    <div class="flex-sb-m w-full p-t-3 p-b-24">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                            <label class="label-checkbox100" for="ckb1">
                                Remember me
                            </label>
                        </div>

						<!-- Falta implementar el forgot           -->
                        <div>
                            <a href="#" class="txt1">
                                Forgot?
                            </a>
                        </div>
                    </div>

                    <div class="container-login100-form-btn m-t-17">
                        <button class="login100-form-btn">
							{{ __('Login') }}
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <!-- <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script> -->

    <script type="text/javascript" src="{{ URL::asset('assets/js/loginmain.js') }}"></script>

</body>

</html>