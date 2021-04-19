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
                        <p class="navbar-brand" href="#"><i class="pe-7s-note2"></i> Productos</p>
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Producto: {{$producto->nombre}} - {{$producto->marca}}</h4>
                                <hr>
                            </div>
                            <div class="content">
                                <form method="POST" action="{{ route('productos.update', $producto->id) }}" role="form">
                                    {{ csrf_field() }}
                                    <input name="_method" type="hidden" value="PATCH">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Nombre</label>
                                                <input type="text" name="nombre" id="nombre" class="form-control"
                                                    value="{{ $producto->nombre }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Marca</label>
                                                <input type="text" name="marca" id="marca" class="form-control"
                                                    value="{{ $producto->marca }}">
                                                <input type="hidden" name="estatus" id="estatus" class="form-control"
                                                    value="1">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Unidades</label>
                                                <input type="number" name="unidades" id="unidades" class="form-control"
                                                    value="{{ $producto->unidades }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Precio adquirido</label>
                                                <input type="number" step="0.01" min="0" name="precio_adquirido" id="precio_adquirido"
                                                    class="form-control" value="{{ $producto->precio_adquirido }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Precio de venta</label>
                                                <input type="number" step="0.01" min="0" name="precio_venta" id="precio_venta"
                                                    class="form-control" value="{{ $producto->precio_venta }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Descripción</label>
                                                <input rows="2" type="text" name="descripcion" id="descripcion"
                                                    class="form-control"
                                                    value="{{ $producto->descripcion }}">
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


        <footer class="footer">
        </footer>

    </div>
</div>


@include('layout.footer')