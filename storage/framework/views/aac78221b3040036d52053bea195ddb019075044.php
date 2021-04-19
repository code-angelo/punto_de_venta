<?php echo $__env->make('layout.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
                        <p class="navbar-brand" href="#"><i class="pe-7s-cart"></i> Comprar</p>
                    </a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a>
                                <p><?php echo e(Auth::user()->nombre); ?> <?php echo e(Auth::user()->apellido); ?></p>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <?php echo e(__('Logout')); ?>

                            </a>

                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                <?php echo csrf_field(); ?>
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
                    <div class="panel panel-success">
                        <!-- <div class="panel-heading">
                            <h6>Titulo del panel</h6>
                        </div> -->
                        <div class="panel-body">
                            <!-- <h6>buscar productos</h6>  -->
                            <div class="table-wrapper-scroll-y scroll-tabla-ventas content">
                                <table class="table table-striped" id="findProductComp">
                                    <thead>
                                        <th class="col-md-1">Num</th>
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
                                <form method="POST" action="<?php echo e(route('compras.store')); ?>" role="form">
                                <?php echo e(csrf_field()); ?>

                                    <table class="table table-hover" id="preVenta">
                                        <thead>
                                            <th class="success col-md-1">#</th>
                                            <th class="success col-md-3">Nombre</th>
                                            <th class="success col-md-3">Marca</th>
                                            <th class="success col-md-2">Precio</th>
                                            <th class="success col-md-1">Unidades</th>
                                            <th class="success ">Opciones</th>
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
                                            <span class="input-group-addon" id="sizing-addon1" required>Total: $</span>
                                            <input type="number" name="total" id="total" readonly class="form-control"
                                                aria-describedby="sizing-addon1" value="00.00">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h6 class="text-center">Usuario / Proveedor</h6>
                        </div>
                        <div class="panel-body">
                            <label>Nombre Usuario:</label>
                            <input type="hidden" name="usuario_id" class="form-control" readonly
                                value="<?php echo e(Auth::user()->id); ?>">
                            <p class="form-control"><?php echo e(Auth::user()->nombre); ?> <?php echo e(Auth::user()->apellido); ?></p>
                            <hr>
                            <div class="form-group">
                                <label for="proveedor">Nombre Proveedor:</label>
                                <select name="proveedor_id" class="form-control" id="proveedor">
                                    <?php $__currentLoopData = $proveedores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proveedor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($proveedor->id); ?>"><?php echo e($proveedor->nombre); ?> <?php echo e($proveedor->apellido); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="panel-heading">
                            <h6 class="text-center">Datos de la compra</h6>
                        </div>
                        <div class="panel-body">
                            <!-- <div class="text-center"><label>Datos de la venta</label></div> -->
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Pago con:</label>
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
                                    <button type="submit" class="btn btn-success btn-fill ">
                                        <font size=6> <i class="pe-7s-cart"></i> Comprar </font>
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
                '<td><input name="cantidad[]" class="form-control" id="unidad-'+contador+'" onChange="multiplicar('+precio+','+contador+')" type="number" min="1" value="'+ 1 +'"></td>'+
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


    <?php echo $__env->make('layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\resources\views/compras/index.blade.php ENDPATH**/ ?>