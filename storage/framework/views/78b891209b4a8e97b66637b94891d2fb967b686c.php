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
                        <p class="navbar-brand" href="#"><i class="pe-7s-prev"></i> Proveedores</p>
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
                    <div class="col-md-8 col-md-offset-2">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Datos</h4>
                            </div>
                            <div class="content">
                                <form method="POST" action="<?php echo e(route('proveedores.store')); ?>" role="form">
                                    <?php echo e(csrf_field()); ?>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Nombre</label>
                                                <input type="text" name="nombre" id="nombre" class="form-control"
                                                    placeholder="Juan">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Apellido</label>
                                                <input type="text" name="apellido" id="apellido" class="form-control"
                                                    placeholder="Flores">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Telefono</label>
                                                <input type="tel" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" name="telefono"
                                                    id="telefono" class="form-control" placeholder="#">
                                                <input type="hidden" name="estatus" id="estatus" class="form-control"
                                                    value="1">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
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

            <div class="Row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Lista de proveedores agregados</h4>
                        </div>
                        <div class="table-wrapper-scroll-y scroll-tabla content">
                            <table class="table">
                                <thead>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>telefono</th>
                                    <th>Estatus</th>
                                    <th>Editar | Eliminar</th>
                                </thead>
                                <tbody>
                                    <?php if($proveedores->count()): ?>
                                    <?php $__currentLoopData = $proveedores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proveedor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($proveedor->id); ?></td>
                                        <td><?php echo e($proveedor->nombre); ?></td>
                                        <td><?php echo e($proveedor->apellido); ?></td>
                                        <td><?php echo e($proveedor->telefono); ?></td>
                                        <td><?php if($proveedor->estatus == 1): ?>
                                            <span class="badge badge-info">Activo</span>

                                            <?php else: ?>
                                            <span class="badge badge-warning">Inactivo</span>

                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a class="btn btn-info btn-simple btn-xs pull-left" rel="tooltip"
                                                title="Editar"
                                                href="<?php echo e(action('ProveedoresController@edit', $proveedor->id)); ?>"><i
                                                    class="fa fa-edit"></i></a>
                                            <a class="btn btn-danger btn-simple btn-xs pull-left" rel="tooltip"
                                                title="Dar de baja"
                                                href="<?php echo e(action('ProveedoresController@baja', $proveedor->id)); ?>"><i
                                                    class="fa fa-times"></i></a>

                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php echo $__env->make('layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\resources\views/proveedores/index.blade.php ENDPATH**/ ?>