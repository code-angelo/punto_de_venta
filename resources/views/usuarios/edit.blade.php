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
                                <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400"
                                    alt="..." />
                            </div>
                            <div class="content">
                                <div class="author">
                                    <a>
                                        <img class="avatar border-gray" src="{{ URL::asset('assets/img/user.png') }}"
                                            alt="..." />

                                        <h4 class="title">{{ $usuario->nombre }}<br />
                                            <small>{{ $usuario->apellido }}</small>
                                        </h4>
                                    </a>
                                </div>
                                <hr>
                                <p class="description text-center"><strong>""</strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Actualizando perfil</h4>
                            </div>
                            <div class="content">
                                <form method="POST" action="{{ route('usuarios.update', $usuario->id) }}" role="form">
                                    {{ csrf_field() }}
                                    <input name="_method" type="hidden" value="PATCH">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Nombre</label>
                                                <input type="text" name="nombre" id="nombre" class="form-control"
                                                    value="{{$usuario->nombre}}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Apellido</label>
                                                <input type="text" name="apellido" id="apellido" class="form-control"
                                                    value="{{$usuario->apellido}}">
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
                                                    id="telefono" class="form-control" value="{{$usuario->telefono}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>E-mail</label>
                                                <input id="email" name="email" type="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    value="{{$usuario->email}}">
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
                                    <button type="submit" class="btn btn-info btn-fill ">Actualizar </button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                        <!-- tarjeta 1 -->
                    </div>
                    <div class="col-md-8">
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <button type="button" class="close " data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <strong>Error!</strong> Revise los campos obligatorios.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if(Session::has('success'))
                        <div class="alert alert-info">
                            <button type="button" class="close " data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            {{Session::get('success')}}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- Trigger the modal with a button -->
    </div>
</div>




@include('layout.footer')