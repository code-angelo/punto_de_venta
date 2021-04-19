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
                        <p class="navbar-brand" href="#"><i class="pe-7s-users"></i> Usuarios</p>
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
                                <form method="POST" action="<?php echo e(route('register')); ?>" role="form">
                                    <?php echo csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Nombre</label>
                                                <input type="text" name="name" id="name"
                                                    class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    value="<?php echo e(old('name')); ?>" required autocomplete="name" autofocus
                                                    placeholder="Juan">
                                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
                                                    class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    name="email" value="<?php echo e(old('email')); ?>" required
                                                    autocomplete="email" placeholder="example@mail.com">
                                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Contraseña</label>
                                                <input id="password" type="password"
                                                    class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    name="password" required autocomplete="new-password"
                                                    placeholder="***">
                                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
                                        <?php if($usuarios->count()): ?>
                                        <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($usuario->id); ?></td>
                                            <td><?php echo e($usuario->nombre); ?></td>
                                            <td><?php echo e($usuario->apellido); ?></td>
                                            <td><?php echo e($usuario->telefono); ?></td>
                                            <td><?php echo e($usuario->email); ?></td>
                                            <!-- <td><?php echo e($usuario->tipo); ?></td> -->
                                            <td><?php if($usuario->estatus == 1): ?>
                                                <span class="badge badge-info">Activo</span>

                                                <?php else: ?>
                                                <span class="badge badge-warning">Inactivo</span>

                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-info btn-simple btn-xs pull-left" rel="tooltip"
                                                    title="Editar"
                                                    href="<?php echo e(action('UsuariosController@edit', $usuario->id)); ?>"><i
                                                        class="fa fa-edit"></i>
                                                </a>
                                                <a class="btn btn-danger btn-simple btn-xs pull-left" rel="tooltip"
                                                    title="Dar de baja"
                                                    href="<?php echo e(action('UsuariosController@baja', $usuario->id)); ?>"><i
                                                        class="fa fa-times"></i>
                                                </a>
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
        <!-- Trigger the modal with a button -->
    </div>
</div>




<?php echo $__env->make('layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\resources\views/usuarios/index.blade.php ENDPATH**/ ?>