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
                        <p class="navbar-brand" href="#"><i class="pe-7s-smile"></i> Clientes</p>
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
                                <form method="POST" action="<?php echo e(route('clientes.store')); ?>" role="form">
                                    <?php echo e(csrf_field()); ?>

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
                                    <?php if($clientes->count()): ?>
                                    <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($cliente->id); ?></td>
                                        <td><?php echo e($cliente->nombre); ?></td>
                                        <td><?php echo e($cliente->apellido); ?></td>
                                        <td><?php echo e($cliente->direccion); ?></td>
                                        <td><?php if($cliente->estatus == 1): ?>
                                            <span class="badge badge-info">Activo</span>

                                            <?php else: ?>
                                            <span class="badge badge-warning">Inactivo</span>

                                            <?php endif; ?>
                                        </td>
                                        <td><a class="btn btn-info btn-simple btn-xs pull-left" rel="tooltip"
                                                title="Editar"
                                                href="<?php echo e(action('ClientesController@edit', $cliente->id)); ?>"><i
                                                    class="fa fa-edit"></i></a>
                                        <a class="btn btn-danger btn-simple btn-xs pull-left" rel="tooltip"
                                                title="Dar de baja"
                                                href="<?php echo e(action('ClientesController@baja', $cliente->id)); ?>"><i
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
    <footer class="footer">
    </footer>
</div>
<?php echo $__env->make('layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\resources\views/clientes/index.blade.php ENDPATH**/ ?>