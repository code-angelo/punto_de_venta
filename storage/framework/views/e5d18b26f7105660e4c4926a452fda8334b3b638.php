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
                        <p class="navbar-brand" href="#"><i class="pe-7s-note2"></i> Productos</p>
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


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Producto</h4>
                            </div>
                            <div class="content">
                                <form method="POST" action="<?php echo e(route('productos.store')); ?>" role="form">
                                    <?php echo e(csrf_field()); ?>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Nombre</label>
                                                <input type="text" name="nombre" id="nombre" class="form-control"
                                                    placeholder="Marcador" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Marca</label>
                                                <input type="text" name="marca" id="marca" class="form-control"
                                                    placeholder="big" value="">
                                                <input type="hidden" name="estatus" id="estatus" class="form-control"
                                                    value="1">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Unidades</label>
                                                <input type="number" name="unidades" id="unidades" class="form-control"
                                                    placeholder="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Precio adquirido</label>
                                                <input type="number" step="0.01" min="0" name="precio_adquirido"
                                                    id="precio_adquirido" class="form-control" placeholder="00.00">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Precio de venta</label>
                                                <input type="number" step="0.01" min="0" name="precio_venta"
                                                    id="precio_venta" class="form-control" placeholder="00.00">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Descripción</label>
                                                <input type="text" name="descripcion" id="descripcion"
                                                    class="form-control" placeholder="Descripción breve del producto">
                                            </div>
                                        </div>

                                    </div>
                                    <button type="submit" class="btn btn-success btn-fill ">Agregar </button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- mensaje de error -->
                    <div class="Row">
                        <div class="col-md-8">
                            <?php if(count($errors) > 0): ?>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close " data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <strong>Error!</strong> Revise los campos obligatorios.<br>
                                <ul>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                            <?php endif; ?>
                            <?php if(Session::has('success')): ?>
                            <div class="alert alert-info"><button type="button" class="close " data-dismiss="alert"
                                    aria-label="Close"><span aria-hidden="true">&times;</span>
                                </button><span><b> Hecho - </b> <?php echo e(Session::get('success')); ?> </span>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>

                <div class="Row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Lista de productos agregados</h4>
                            </div>
                            <!--CLASES PARA SCROLL: table-wrapper-scroll-y scroll-tabla content -->
                            <div class="table-wrapper-scroll-y scroll-tabla-lg content">
                                <table class="table table-striped" id="tableProducts">
                                    <thead>
                                        <th>Num</th>
                                        <th>Nombre</th>
                                        <th>Marca</th>
                                        <th>Descripción</th>
                                        <th>Precio compra</th>
                                        <th>Precio venta</th>
                                        <th>Unidades</th>
                                        <th>Estatus</th>
                                        <th>Opciones</th>
                                    </thead>

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
</div>


<?php echo $__env->make('layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\resources\views/productos/index.blade.php ENDPATH**/ ?>