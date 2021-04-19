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
                        <p class="navbar-brand" href="#"><i class="pe-7s-calculator"></i> Ventas</p>
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
        <!-- <div class="content"> -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    <div class="panel panel-primary">
                        <!-- <div class="panel-heading">
                            <h6>Titulo del panel</h6>
                        </div> -->
                        <div class="panel-body">
                            <!-- <h6>buscar productos</h6>  -->
                            <div class="table-wrapper-scroll-y scroll-tabla-ventas content">
                                <table class="table table-striped" id="findProduct">
                                    <thead>
                                        <th>Num</th>
                                        <th>Nombre</th>
                                        <th>Marca</th>
                                        <th>Precio</th>
                                        <th>Unidades</th>
                                        <th>Opciones</th>
                                    </thead>


                                </table>

                            </div>
                            <hr>
                            <label>Carrito de compras</label>
                            <div class="table-wrapper-scroll-y scroll-tabla-ventas content">
                                <form method="POST" action="{{ route('ventas.store') }}" role="form">
                                {{ csrf_field() }}
                                    <table class="table table-hover" id="preVenta">
                                        <thead>
                                            <th class="info col-md-1">Num</th>
                                            <th class="info col-md-3">Nombre</th>
                                            <th class="info col-md-3">Marca</th>
                                            <th class="info col-md-2">Precio</th>
                                            <th class="info col-md-1">Unidades</th>
                                            <th class="info">Opciones</th>
                                        </thead>
                                        <tbody id="listaVenta">
                                        </tbody>
                                    </table>

                            </div>
                            <div class="panel-footer">
                                <!-- <label>Sub Total:</label> -->
                                <div class="row">
                                    <div class="col-md-8"></div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="sizing-addon1">Total: $</span>
                                            <input type="number" name="total" id="total" readonly class="form-control"
                                                aria-describedby="sizing-addon1" value="00.00" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h6 class="text-center">Vendedor / Cliente</h6>
                        </div>
                        <div class="panel-body">
                            <label>Nombre Vendedor:</label>
                            <input type="hidden" name="usuario_id" class="form-control" readonly
                                value="{{ Auth::user()->id }}">
                            <p class="form-control">{{ Auth::user()->nombre }} {{ Auth::user()->apellido }}</p>
                            <hr>
                            <div class="form-group">
                                <label for="client">Nombre Cliente:</label>
                                <select name="cliente_id" class="form-control" id="client">
                                    @foreach($clientes as $cliente)
                                    <option value="{{$cliente->id}}">{{$cliente->nombre}} {{$cliente->apellido}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="panel-heading">
                            <h6 class="text-center">Datos de la venta</h6>
                        </div>
                        <div class="panel-body">
                            <!-- <div class="text-center"><label>Datos de la venta</label></div> -->
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Recibo:</label>
                                            <input type="number" step="0.1" min="0" name="recibido" id="recibido"
                                                class="form-control" placeholder="25.5" required>
                                            <br>
                                            <label>Cambio:</label>
                                            <input type="number" step="0.1" readonly name="cambio" id="cambio"
                                                class="form-control" placeholder="25.5" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-lg btn-primary btn-fill ">
                                        <font size=6> <i class="pe-7s-cart"></i> Vender </font>
                                    </button>
                                </div>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- </div> -->
    </div>






    <script>
    var contador = 0;

    function addProduct(id, nombre, marca, precio, unidad) {
        
        if ($("#row-" + id).length == 0) {
            contador = contador + 1;
            $('#preVenta #listaVenta').append(
                '<tr id="row-'+id+'">'+
                '<td><input name="car_num['+contador+']" value="'+ contador +'" disabled class="form-control "/><input type="hidden" name="producto_id[]" value="'+id+'"></td>'+
                '<td><input name="producto[]" value="'+nombre+'"  class="form-control" readonly/></td>'+
                '<td>'+marca+'</td>'+
                '<td><input class="form-control sub" readonly name="precio[]" id="precio-'+contador+'" type="number" min="0" step="0.01" value="'+precio+'"></td>'+
                '<td><input name="cantidad[]" class="form-control" id="unidad-'+contador+'" onChange="multiplicar('+precio+','+contador+')" type="number" min="1" max="'+unidad+'" value="'+ 1 +'"></td>'+
                '<td><button class="btn btn-fill btn-sm btn-danger" onclick="removeProduct('+id+');"> Quitar </button></td>'+
                '</tr>');
        }
        calcularTotal();
        calcularCambio();

    }

    function removeProduct(index) {
        $('#preVenta #listaVenta #row-' + index).remove();
        // contador--;
        calcularTotal();
        calcularCambio();
    }

    function multiplicar(precio, index) {
        var prec = precio;
        var unidad = $('#unidad-' + index).val();
        var total = unidad * prec;
        $('#precio-' + index).val(total);
        calcularTotal(index);
        calcularCambio();
    }

    function calcularTotal() {
        var totales = 0;
        $('.sub').each(function() {
            totales += parseFloat($(this).val());
        });
        $('#total').val(totales);
    }

    function calcularCambio() {
        var total = parseFloat($('#total').val());
        var recibido = parseFloat($('#recibido').val());
        var cambio = recibido - total;

        $('#cambio').val(cambio);

    }

    $(document).ready(function() {
        $('#recibido').bind('keyup', function() {
            calcularCambio();
        });
    });
    </script>


    @include('layout.footer')