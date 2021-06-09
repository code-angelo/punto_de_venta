@include('layout.sidebar')

<div class="wrapper">

    <div class="main-panel">
        <nav class="navbar navbar-inverse navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a>
                        <p class="navbar-brand" href="#"><i class="pe-7s-smile"></i> Clientes</p>
                    </a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a>
                                <p>{{ Auth::user()->nombre }} {{ Auth::user()->apellido }}</p>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">



                    <div class="col-md-8 col-md-offset-2">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Datos</h4>
                            </div>
                            <div class="content">
                                <form method="POST" action="{{ route('clientes.store') }}" role="form">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Nombre</label>
                                                <input type="text" name="nombre" id="nombre" class="form-control"
                                                    placeholder="Albert">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Apellido</label>
                                                <input type="text" name="apellido" id="apellido" class="form-control"
                                                    placeholder="Rodríguez ">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Dirección</label>
                                                <input type="text" name="direccion" id="direccion" class="form-control"
                                                    placeholder="Tarimoro - centro">
                                                <input type="hidden" name="estatus" id="estatus" class="form-control"
                                                    value="1">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-fill ">Agregar </button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="Row">
                <div class="col-md-8 col-md-offset-2">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close " data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <strong>Error!</strong> Revise los campos obligatorios.<br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(Session::has('success'))
                    <div class="alert alert-info"><button type="button" class="close " data-dismiss="alert"
                            aria-label="Close"><span aria-hidden="true">&times;</span>
                        </button><span><b> Hecho - </b> {{Session::get('success')}} </span>
                    </div>
                    @endif
                </div>
            </div>

            <div class="Row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Lista de clientes agregados</h4>
                        </div>
                        <div class="table-wrapper-scroll-y scroll-tabla content">
                            <table class="table">
                                <thead>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Dirección</th>
                                    <th>Estatus</th>
                                    <th>Editar | Eliminar</th>
                                </thead>
                                <tbody>
                                    @if($clientes->count())
                                    @foreach($clientes as $cliente)
                                    <tr>
                                        <td>{{$cliente->id}}</td>
                                        <td>{{$cliente->nombre}}</td>
                                        <td>{{$cliente->apellido}}</td>
                                        <td>{{$cliente->direccion}}</td>
                                        <td>@if($cliente->estatus == 1)
                                            <span class="badge badge-info">Activo</span>

                                            @else
                                            <span class="badge badge-warning">Inactivo</span>

                                            @endif
                                        </td>
                                        <td><a class="btn btn-info btn-simple btn-xs pull-left" rel="tooltip"
                                                title="Editar"
                                                href="{{action('ClientesController@edit', $cliente->id)}}"><i
                                                    class="fa fa-edit"></i></a>
                                        <a class="btn btn-danger btn-simple btn-xs pull-left" rel="tooltip"
                                                title="Dar de baja"
                                                href="{{action('ClientesController@baja', $cliente->id)}}"><i
                                                    class="fa fa-times"></i></a>

                                            
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
    </footer>
</div>
@include('layout.footer')