</body>


<script src="<?php echo e(URL::asset('assets/js/bootstrap.min.js')); ?>" type="text/javascript"></script>

<!--  Charts Plugin -->
<script src="<?php echo e(URL::asset('assets/js/chartist.min.js')); ?>"></script>

<!--  Notifications Plugin    -->
<script src="<?php echo e(URL::asset('assets/js/bootstrap-notify.js')); ?>"></script>

<!--  Google Maps Plugin    -->
<!-- <script type="text/javascripst" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="<?php echo e(URL::asset('assets/js/light-bootstrap-dashboard.js?v=1.4.0')); ?>"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<!-- <script src="assets/js/demo.js"></script> -->

<!-- datatable -->
<script type="text/javascript" src="<?php echo e(URL::asset('assets/js/datatables.min.js')); ?>"></script>








<script>
$(document).ready(function() {
    $('#tableProducts').DataTable({
        "dom": 'Blfrtip',
        "buttons": [
			{
				extend:    'pdfHtml5',
				text:      'PDF',
				titleAttr: 'Exportar a PDF',
				className: 'btn btn-sm btn-danger btn-fill '
			},
			{
				extend:    'print',
				text:      '<i class="fa fa-print"></i> ',
				titleAttr: 'Imprimir',
				className: 'btn btn-sm btn-info btn-fill'
			},
        ],
        "serverSide": true,
        "ajax": "<?php echo e(url('api/productos')); ?>",
        "columns": [{
                data: 'id'
            },
            {
                data: 'nombre'
            },
            {
                data: 'marca'
            },
            {
                data: 'descripcion'
            },
            {
                data: 'precio_adquirido'
            },
            {
                data: 'precio_venta'
            },
            {
                data: 'unidades'
            },
            {
                data: 'estado'
            },
            {
                data: 'opciones'
            },
        ],
        "language": {
            "info": "_TOTAL_ registros",
            "search": "Buscar",
            "paginate": {
                "next": "Siguiente",
                "previous": "Anterior",
            },
            "lengthMenu": "Ver _MENU_ Elementos",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "emptyTable": "No hay datos",
            "zeroRecords": "No hay coincidencias",
            "infoEmpty": "",
            "infoFiltered": ""
        }
    });

    $('#findProduct').DataTable({
        "serverSide": true,
        "ajax": "<?php echo e(url('api/buscar')); ?>",
        "columns": [{
                data: 'id'
            },
            {
                data: 'nombre'
            },
            {
                data: 'marca'
            },
            {
                data: 'precio_venta'
            },
            {
                data: 'unidades'
            },
            {
                data: 'opciones'
            },
        ],
        "language": {
            "info": "_TOTAL_ registros",
            "search": "Buscar",
            "paginate": {
                "next": "Siguiente",
                "previous": "Anterior",
            },
            "lengthMenu": "Ver _MENU_ Elementos",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "emptyTable": "No hay datos",
            "zeroRecords": "No hay coincidencias",
            "infoEmpty": "",
            "infoFiltered": ""
        }
    });
    $('#findProductComp').DataTable({
        "serverSide": true,
        "ajax": "<?php echo e(url('api/compras')); ?>",
        "columns": [{
                data: 'id'
            },
            {
                data: 'nombre'
            },
            {
                data: 'marca'
            },
            {
                data: 'precio_adquirido'
            },
            {
                data: 'unidades'
            },
            {
                data: 'opciones'
            },
        ],
        "language": {
            "info": "_TOTAL_ registros",
            "search": "Buscar",
            "paginate": {
                "next": "Siguiente",
                "previous": "Anterior",
            },
            "lengthMenu": "Ver _MENU_ Elementos",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "emptyTable": "No hay datos",
            "zeroRecords": "No hay coincidencias",
            "infoEmpty": "",
            "infoFiltered": ""
        }
    });
});
</script>


</html><?php /**PATH C:\xampp\htdocs\laravel\resources\views/layout/footer.blade.php ENDPATH**/ ?>