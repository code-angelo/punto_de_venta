<!-- <script>
$(document).ready(function() {
      $('#editUser').click(function(id){
        alert('sss');
        $.ajax({
        	url: '{{action('UsuariosController@edit', $usuario->id)}}',
        	success: function(respuesta) {
        		alert(respuesta);
        	},
        	error: function() {
                console.log("No se ha podido obtener la información");
            }
        });
    });
});
</script> -->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- contenido del modal -->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Actualizar </h4>
            </div>
            <div class="modal-body">
                <!-- id para form update_id -->
                <div class="card">
                    <div class="header">
                        <h4 class="title">Perfil</h4>
                    </div>
                    <div class="content">
                        <form method="POST" action="{{ route('usuarios.update', $usuario->id) }}" role="form">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="PATCH">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input type="text" name="nombre" id="nombre" class="form-control"
                                            value="{{$usuario->apellido}}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Apellido</label>
                                        <input type="text" name="tipo" id="tipo" class="form-control"
                                            placeholder="Flores" value="{{$usuario->tipo}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Celular</label>
                                        <input type="email" name="telefono" id="telefono" class="form-control"
                                            value="{{$usuario->telefono}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Usuario</label>
                                        <input type="text" class="form-control" placeholder="usuario" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Contraseña</label>
                                        <input type="text" class="form-control" placeholder="" value="">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-fill ">Actualizar</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
