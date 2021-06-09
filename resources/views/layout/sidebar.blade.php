<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="{{ URL::asset('assets/img/favicon.ico') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Punto de Venta</title>


    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{ URL::asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{ URL::asset('assets/css/animate.min.css') }}" rel="stylesheet" />

    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{ URL::asset('assets/css/light-bootstrap-dashboard.css?v=1.4.0')}}" rel="stylesheet" />




    <!-- Estilos personalizados de css -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/misestilos.css')}}" media="screen">

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="{{ URL::asset('assets/css/pe-icon-7-stroke.css') }}" rel="stylesheet" />


      <!-- Core JS Files   -->
    <script src="{{ URL::asset('assets/js/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
    <!-- datatable -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/datatables.min.css')}}" />
    <!-- Chart style -->
    <!-- <link rel="stylesheet" type="text/css" href="assets/css/Chart.css" /> -->

    <style>
        .navbar-inverse .navbar-brand {
        color:#FFFFFF;
        }
    </style>




</head>

<body>
    <div class="wrapper">

        <div class="sidebar" data-color="blue" data-image="{{ URL::asset('assets/img/sidebar-4.jpg') }}">
            <!-- cambiar color de sidebar: data-color="blue | azure | green | orange | red | purple | " -->
            <!-- elementos del side bar -->

            <div class="sidebar-wrapper">
                <div class="logo">
                    <h5 class="simple-text"><strong>Papeleria San José</strong></h5>

                </div>

                <ul class="nav">
                    <!-- ACTIVAR EL lIST ITEM PARA QUE SE MARQUE SELECCIONADO -->
                    <li class="">
                        <a href="<?php echo url('/tablero') ?>">
                            <i class="pe-7s-graph"></i>
                            <p>Estadísticas</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('ventas.index') }}">
                            <i class="pe-7s-calculator"></i>
                            <p>Vender</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('productos.index') }}">
                            <i class="pe-7s-note2"></i>
                            <p>Productos</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url('/compras') ?>">
                            <i class="pe-7s-cart"></i>
                            <p>Comprar</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('usuarios.index')}}">
                            <i class="pe-7s-users"></i>
                            <p>Usuarios</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url('/clientes') ?>">
                            <i class="pe-7s-smile"></i>
                            <p>Clientes</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url('/proveedores') ?>">
                            <i class="pe-7s-prev"></i>
                            <p>Proveedores</p>
                        </a>
                    </li>


                </ul>
            </div>
        </div>
        <!-- aqui acaba el sidebar -->