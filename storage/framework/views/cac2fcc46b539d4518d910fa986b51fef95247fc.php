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
                        <p class="navbar-brand" href="#"><i class="pe-7s-graph1"></i> Estadísticas</p>
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
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Ventas por mes</h4>
                                <!-- <p class="category">24 Hours performance</p> -->
                            </div>
                            <div class="content">
                                <canvas id="myChart" width="100%" height="45%"></canvas>
                                <div class="footer">
                                    <!-- <div class="legend">
                                        <i class="fa fa-circle text-info"></i> Open
                                        <i class="fa fa-circle text-danger"></i> Click
                                        <i class="fa fa-circle text-warning"></i> Click Second Time
                                    </div> -->
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-history"></i> Actualizado hoy
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card ">
                            <div class="header">
                                <h4 class="title">Ultimas ventas</h4>
                            </div>
                            <div class="content">
                                <div class="table-wrapper-scroll-y scroll-tabla ">
                                    <table class="table table-hover">
                                        <thead class="thead-dark">
                                            <th>#</th>
                                            <th><strong>total</strong></th>
                                            <th>fecha</th>
                                        </thead>
                                        <tbody>
                                            <?php if($ventas->count()): ?>
                                            <?php $__currentLoopData = $ventas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $venta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($venta->id); ?></td>
                                                <td><strong>$<?php echo e($venta->total); ?></strong></td>
                                                <td><?php echo e($venta->created_at); ?></td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </tbody>

                                    </table>
                                </div>

                                <div class="footer">
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-history"></i> Actualizado hoy
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card ">
                            <div class="header">
                                <h4 class="title">Ultimas Compras</h4>
                            </div>
                            <div class="content">
                                <div class="table-wrapper-scroll-y scroll-tabla ">
                                    <table class="table table-hover">
                                        <thead class="thead-dark">
                                            <th>#</th>
                                            <th><strong>total</strong></th>
                                            <th>fecha</th>
                                        </thead>
                                        <tbody>
                                            <?php if($compras->count()): ?>
                                            <?php $__currentLoopData = $compras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $compra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($compra->id); ?></td>
                                                <td><strong>$<?php echo e($compra->total); ?></strong></td>
                                                <td><?php echo e($compra->created_at); ?></td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </tbody>

                                    </table>
                                </div>

                                <div class="footer">
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-history"></i> Actualizado hoy
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Compras por mes</h4>
                                <!-- <p class="category">24 Hours performance</p> -->
                            </div>
                            <div class="content">
                                <canvas id="myChart2" width="100%" height="45%"></canvas>
                                <div class="footer">
                                    <!-- <div class="legend">e
                                        <i class="fa fa-circle text-info"></i> Open
                                        <i class="fa fa-circle text-danger"></i> Click
                                        <i class="fa fa-circle text-warning"></i> Click Second Time
                                    </div> -->
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-history"></i> Actualizado hoy
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">($) Inversión | Ventas</h4>
                                <!-- <p class="category">24 Hours performance</p> -->
                            </div>
                            <div class="content">
                                <canvas id="myChart3" width="100%" height="40%"></canvas>
                                <div class="footer">
                                    <!-- <div class="legend">e
                                        <i class="fa fa-circle text-info"></i> Open
                                        <i class="fa fa-circle text-danger"></i> Click
                                        <i class="fa fa-circle text-warning"></i> Click Second Time
                                    </div> -->
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-history"></i> Actualizado hoy
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<!-- chart js -->
<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script> -->
<script type="text/javascript" src="<?php echo e(URL::asset('assets/js/Chart.js')); ?>"></script>


<script>
$.ajax({
    url: "<?php echo e(url('/tab')); ?>",
    type: 'get',
    success: function(response) { // la respuesta trae los datos obtenidos de las ventas

        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: response.months, //arreglo de datos
                datasets: [{
                    label: '# de Ventas',
                    data: response.sells_count_data, //arreglo de datos
                    backgroundColor: [
                        'rgba(62, 123, 197, 0.7)',
                    ],
                    borderColor: [
                        'rgba(4, 57, 217, 1)',
                        'rgba(4, 191, 123, 1)',
                        'rgba(56, 199, 189, 1)',
                        'rgba(242, 53, 104, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 120, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 0, 122, 1)',
                        'rgba(62, 46, 166, 1)',
                        'rgba(255, 0, 71, 1)',

                    ],
                    borderWidth: 3
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    },
    statusCode: {
        404: function() {
            alert('web not found');
        }
    },
    error: function(x, xs, xt) {
        //nos dara el error si es que hay alguno
        window.open(JSON.stringify(x));
        //alert('error: ' + JSON.stringify(x) +"\n error string: "+ xs + "\n error throwed: " + xt);
    }
});
</script>

<script>
$.ajax({
    url: "<?php echo e(url('/tab2')); ?>",
    type: 'get',
    success: function(response) { // la respuesta trae los datos obtenidos de las ventas

        var ctx = document.getElementById('myChart2');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: response.months, //arreglo de datos
                datasets: [{
                    label: '# de Compras',
                    data: response.sells_count_data, //arreglo de datos
                    backgroundColor: [
                        'rgba(204, 0, 0, 0.5)',
                    ],
                    borderColor: [
                        'rgba(255, 0, 71, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(56, 199, 189, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 120, 1)',
                        'rgba(4, 57, 217, 1)',
                        'rgba(62, 46, 166, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(4, 191, 123, 1)',
                        'rgba(242, 53, 104, 1)',
                        'rgba(255, 0, 122, 1)',

                    ],
                    borderWidth: 3
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    },
    statusCode: {
        404: function() {
            alert('web not found');
        }
    },
    error: function(x, xs, xt) {
        //nos dara el error si es que hay alguno
        window.open(JSON.stringify(x));
        //alert('error: ' + JSON.stringify(x) +"\n error string: "+ xs + "\n error throwed: " + xt);
    }
});
</script>

<script>
$.ajax({
    url: "<?php echo e(url('/tabVentas')); ?>",
    type: 'get',
    success: function(response) { // la respuesta trae los datos obtenidos de las ventas

        var ctx = document.getElementById('myChart3');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: response.months, //arreglo de datos
                datasets: [{ // Datos de Compras o inversiones
                    label: '$ Inversión',
                    data: response.buys_count_data, //arreglo de datos
                    backgroundColor: [
                        'rgba(255, 246, 0, 0.45)',
                        'rgba(255, 246, 0, 0.45)',
                        'rgba(255, 246, 0, 0.45)',
                        'rgba(255, 246, 0, 0.45)',
                        'rgba(255, 246, 0, 0.45)',
                        'rgba(255, 246, 0, 0.45)',
                        'rgba(255, 246, 0, 0.45)',
                        'rgba(255, 246, 0, 0.45)',
                        'rgba(255, 246, 0, 0.45)',
                        'rgba(255, 246, 0, 0.45)',
                        'rgba(255, 246, 0, 0.45)',
                        'rgba(255, 246, 0, 0.45)',
                    ],
                    borderColor: [
                        'rgba(229, 19, 54, 1)',
                        'rgba(255, 0, 71, 1)',
                        'rgba(255, 0, 71, 1)',
                        'rgba(255, 0, 71, 1)',
                        'rgba(255, 0, 71, 1)',
                        'rgba(255, 0, 71, 1)',
                        'rgba(255, 0, 71, 1)',
                        'rgba(255, 0, 71, 1)',
                        'rgba(255, 0, 71, 1)',
                        'rgba(255, 0, 71, 1)',
                        'rgba(255, 0, 71, 1)',
                        'rgba(255, 0, 71, 1)',
                    ],
                    borderWidth: 2
                }, {
                    label: '$ Ventas',
                    data: response.sells_count_data, //arreglo de datos
                    backgroundColor: [
                        'rgba(2, 166, 148, 0.5)',
                        'rgba(2, 166, 148, 0.5)',
                        'rgba(2, 166, 148, 0.5)',
                        'rgba(2, 166, 148, 0.5)',
                        'rgba(2, 166, 148, 0.5)',
                        'rgba(2, 166, 148, 0.5)',
                        'rgba(2, 166, 148, 0.5)',
                        'rgba(2, 166, 148, 0.5)',
                        'rgba(2, 166, 148, 0.5)',
                        'rgba(2, 166, 148, 0.5)',
                        'rgba(2, 166, 148, 0.5)',
                        'rgba(2, 166, 148, 0.5)',

                    ],
                    borderColor: [
                        'rgba(0, 0, 255, 1)',
                        'rgba(0, 0, 255, 1)',
                        'rgba(0, 0, 255, 1)',
                        'rgba(0, 0, 255, 1)',
                        'rgba(0, 0, 255, 1)',
                        'rgba(0, 0, 255, 1)',
                        'rgba(0, 0, 255, 1)',
                        'rgba(0, 0, 255, 1)',
                        'rgba(0, 0, 255, 1)',
                        'rgba(0, 0, 255, 1)',
                        'rgba(0, 0, 255, 1)',
                        'rgba(0, 0, 255, 1)',
                    ],
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    },
    statusCode: {
        404: function() {
            alert('web not found');
        }
    },
    error: function(x, xs, xt) {
        //nos dara el error si es que hay alguno
        window.open(JSON.stringify(x));
        //alert('error: ' + JSON.stringify(x) +"\n error string: "+ xs + "\n error throwed: " + xt);
    }
});
</script>




<?php echo $__env->make('layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\resources\views/tablero/index.blade.php ENDPATH**/ ?>