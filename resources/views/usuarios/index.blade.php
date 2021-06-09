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
                        <p class="navbar-brand" href="#"><i class="pe-7s-users"></i> Usuarios</p>
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
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="assets/img/background.webp"
                                    alt="..." />
                            </div>
                            <div class="content">
                                <div class="author">
                                    <a href="#">
                                        <img class="avatar border-gray" src="assets/img/user.png" alt="..." />

                                        <h4 class="title">"Nombre"<br />
                                            <small>"Apellido"</small>
                                        </h4>
                                    </a>
                                </div>
                                <hr>
                                <p class="description text-center"><strong>"Tipo de usuario"</strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Perfil</h4>
                            </div>
                            <div class="content">
                                <form method="POST" action="{{ route('register') }}" role="form">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Nombre</label>
                                                <input type="text" name="name" id="name"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    value="{{ old('name') }}" required autocomplete="name" autofocus
                                                    placeholder="Juan">
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Apellido</label>
                                                <input type="text" name="apellido" id="apellido" class="form-control"
                                                    placeholder="Flores">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Tipo</label>
                                            <select class="form-control" id="tipo" name="tipo">
                                                <option value="user" selected> usuario</option>
                                                <option value="admin"> administrador</option>
                                            </select>
                                            <input type="hidden" name="estatus" id="estatus" class="form-control"
                                                value="1">
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Celular</label>
                                                <input type="tel" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" name="telefono"
                                                    id="telefono" class="form-control" placeholder="466">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>E-mail</label>
                                                <input id="email" type="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    name="email" value="{{ old('email') }}" required
                                                    autocomplete="email" placeholder="example@mail.com">
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Contraseña</label>
                                                <input id="password" type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" required autocomplete="new-password"
                                                    placeholder="***">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Confirmar contraseña</label>
                                                <input id="password-confirm" type="password" class="form-control"
                                                    name="password_confirmation" required autocomplete="new-password"
                                                    placeholder="***">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-fill ">Agregar</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- mensajes de error o realizado  -->
                    <div class="Row">
                        <div class="col-md-8">
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
                </div>


                <div class="Row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Lista de usuarios agregados</h4>
                            </div>
                            <div class="table-wrapper-scroll-y scroll-tabla content">
                                <table class="table table-striped">
                                    <thead>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>telefono</th>
                                        <th>E-Mail</th>
                                        <!-- <th>tipo</th> -->
                                        <th>Estatus</th>
                                        <th>Editar | Eliminar</th>
                                    </thead>
                                    <tbody>
                                        @if($usuarios->count())
                                        @foreach($usuarios as $usuario)
                                        <tr>
                                            <td>{{$usuario->id}}</td>
                                            <td>{{$usuario->nombre}}</td>
                                            <td>{{$usuario->apellido}}</td>
                                            <td>{{$usuario->telefono}}</td>
                                            <td>{{$usuario->email}}</td>
                                            <!-- <td>{{$usuario->tipo}}</td> -->
                                            <td>@if($usuario->estatus == 1)
                                                <span class="badge badge-info">Activo</span>

                                                @else
                                                <span class="badge badge-warning">Inactivo</span>

                                                @endif
                                            </td>
                                            <td>
                                                <a class="btn btn-info btn-simple btn-xs pull-left" rel="tooltip"
                                                    title="Editar"
                                                    href="{{action('UsuariosController@edit', $usuario->id)}}"><i
                                                        class="fa fa-edit"></i>
                                                </a>
                                                <a class="btn btn-danger btn-simple btn-xs pull-left" rel="tooltip"
                                                    title="Dar de baja"
                                                    href="{{action('UsuariosController@baja', $usuario->id)}}"><i
                                                        class="fa fa-times"></i>
                                                </a>
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
        <!-- Trigger the modal with a button -->
    </div>
</div>




@include('layout.footer')