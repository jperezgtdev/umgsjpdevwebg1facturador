
<?php
$this->load->view('templates/header');
?>

<div class="container">
    
    <br>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Agregar Usuario</button>
    <br><br>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <form action="<?php echo site_url('usuario/insertar'); ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                        <div class="form-group">
                            <label for="usuario">Usuario</label>
                            <input type="text" class="form-control" name="usuario" id="usuario" required autocomplete="usuario">
                        </div>
                        <div class="form-group">
                            <label for="email">correo</label>
                            <input type="email" class="form-control" name="correo" id="correo" required autocomplete="correo">
                        </div>
                        <div class="form-group">
                            <label for="password">pass</label>
                            <input type="password" class="form-control" onfocusout="cifrarpass();" name="pass" id="pass" required>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="number" class="form-control" name="telefono" id="telefono" required>
                        </div>
                        <div class="form-group">
                            <label for="rol">Rol</label>
                            <select class="form-select" name="fk_rol" id="rol" required>
                                <option value="0">seleccion un rol</option>
                                <?php foreach($roles as $role) : ?>
                                    <option value="<?php echo $role->id_rol; ?>"><?php echo $role->nombre_rol; ?></option>
                                <?php endforeach; ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="rol">estado</label>
                            <select class="form-select" name="estado" id="estado" required>
                                <option value="">seleccione estado</option>
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                        </div>
            
               
                </div>
                <div class="modal-footer">
                    
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button class="btn btn-primary" type="submit" value="Registrarme">Registrarse</button>
                </div>
                </form>
            </div>
           
        </div>
    </div>

    <!-- Segundo modal de edición -->
    <div class="modal fade" id="editModal2" tabindex="-1" aria-labelledby="editModal2Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?php echo site_url('usuario/guardarEdicion '); ?>" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModal2Label">Editar Registro</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Campos de edición para el segundo modal -->
        
                        <div class="form-group">
                            <label for="edit_usuario">Usuario</label>
                            <input type="text" class="form-control" name="edit_usuario" id="edit_usuario2"  required>
                        </div>
                        <div class="form-group">
                            <label for="edit_correo">Correo</label>
                            <input type="email" class="form-control" name="edit_correo" id="edit_correo2"required >
                        </div>
                        <div class="form-group">
                            <label for="edit_nombre">Nombre</label>
                            <input type="text" class="form-control" name="edit_nombre" id="edit_nombre2" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_telefono">Teléfono</label>
                            <input type="number" class="form-control" name="edit_telefono" id="edit_telefono2"required >
                        </div>
                        <div class="form-group">
                            <label for="edit_rol">Rol</label>

                      <select class="form-select" name="edit_fk_rol" id="edit_rol2">
                                <option value="0">seleccion un rol</option>
                                <?php foreach($roles as $role) : ?>
                                    <option value="<?php echo $role->id_rol; ?>"><?php echo $role->nombre_rol; ?></option>
                                <?php endforeach; ?>

                            </select>
                            
                        </div>
                        <div class="form-group">
                            <label for="edit_estado">Estado</label>
                            <select class="form-select" name="edit_estado" id="edit_estado2" >
                            <option value="3">Seleccione un estado</option>
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                        </div>
                        <div class ="from -group">
                            <input type="hidden" id="Edi" name ="id_usuario">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- tercer modal de edición -->
    <div class="modal fade" id="eliminarModal" tabindex="-1" aria-labelledby="editModal2Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?php echo site_url('usuario/eliminarUsuario'); ?>" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModal2Label">Eliminar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Campos de edición para el segundo modal -->
        
                        <div class="form-group">
                            <label id="mensaje">¿desea eliminar el usuario?</label>
                            <input type="hidden" name ="mEliminar" id="mensaje_id">

                        </div>
                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Eliminar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h1 class="card-title" style="font-weight: bold; font-size: 20px;ss">Usuarios</h1>
            <br>
            <hr>
            <table class="table table-hover table-bordered table-striped" id="tabla">
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Nombre</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Rol</th>
                        <th>Estado</th>
                        <th></th>
                        <th></th> 
                    </tr>
                </thead>
                <tbody>
                <?php foreach  ($resultados as $row): ?>
                    <tr>
                        <td><?php echo $row->usuario; ?></td>
                        <td><?php echo $row->nombre; ?></td>
                        <td><?php echo $row->telefono; ?></td>
                        <td><?php echo $row->correo; ?></td>
                        <td><?php echo $row->nombre_rol; ?></td>
                        <td><?php echo $row->estado; ?></td>
                        <td><button class="btn btn-primary btn-sm btn-editar"   data-bs-toggle="modal" data-bs-target="#editModal2"  data-id="<?php echo $row->id_usuario; ?>">Editar</button></td>
                        <td><button class="btn btn-danger btn-sm btn-eliminar"   data-bs-toggle="modal" data-bs-target="#eliminarModal"  data-id="<?php echo $row->id_usuario; ?>"   >Eliminar</button></td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        
    });

    $(".btn-editar").click(function() {
        console.log("Botón Editar clickeado");
        var id_usuario = $(this).data("id");
        var usuario = $(this).closest("tr").find("td:eq(0)").text();
        var nombre = $(this).closest("tr").find("td:eq(1)").text();
        var telefono = $(this).closest("tr").find("td:eq(2)").text();
        var correo = $(this).closest("tr").find("td:eq(3)").text();
        var rol = $(this).closest("tr").find("td:eq(4)").text();
        var estado = $(this).closest("tr").find("td:eq(5)").text();
debugger  ;
        $("#edit_usuario2").val(usuario);
        $("#edit_nombre2").val(nombre);
        $("#edit_telefono2").val(telefono);
        $("#edit_correo2").val(correo);
        $("#edit_rol2").find("option").each(function() {
            if ($(this).text() === rol) {
                $(this).prop("selected", true); 
                return false;
            }
        });

        if(estado == 'Activo'){
            $("#edit_estado2").val(1);
        }else if(estado == 'Inactivo'){
            $("#edit_estado2").val(0);
        }else{
            $("#edit_estado2").val(3);
        }
        $("#Edi").val(id_usuario);
                
    });

    //cifrar la contraseña

    function cifrarpass(){
	    var pass = $("#pass").val();
		var codificada = btoa(pass);
		console.log(codificada);
		$("#pass").val(codificada);
		console.log("Finalice");
	}


//eliminado logico
    $(".btn-eliminar").click(function() {
        var c = $(this).data("id");
        $("#mensaje_id").val(c);
    });
//VALIDA LOS FOCUS DEL PRIMER MODAL

        // Validación para que el campo usuario no acepte números ni se ingresen solo espacios en blanco - ingreso
        $('#usuario').focusout(function(){
            var regex = /^[a-zA-Z]+$/;
            
            if (!regex.test($('#usuario').val())) {
                $('#usuario').val("");
                $('#usuario').css({
                    "border-color": "red"
                });
                $('#usuario').attr("placeholder", "usuario no válido");
            }
        });

        $('#usuario').focus(function() {
            $('#usuario').css({
                "border-color": "" 
            });
            $('#usuario').attr("placeholder", "");
        });
        
        // Validación para que el campo correo no acepte números ni se ingresen solo espacios en blanco - ingreso
        $('#correo').focusout(function(){
            var regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            
            if (!regex.test($('#correo').val())) {
                $('#correo').val("");
                $('#correo').css({
                    "border-color": "red"
                });
                $('#correo').attr("placeholder", "correo no válido");
            }
        });

        $('#correo').focus(function() {
            $('#correo').css({
                "border-color": "" 
            });
            $('#correo').attr("placeholder", "");
        });

        // Validación para que el campo nombre no acepte números ni se ingresen solo espacios en blanco - ingreso
        $('#nombre').focusout(function(){
            var regex = /^[a-zA-Z]+( [a-zA-Z]+)*$/;
            
            if (!regex.test($('#nombre').val())) {
                $('#nombre').val("");
                $('#nombre').css({
                    "border-color": "red"
                });
                $('#nombre').attr("placeholder", "Nombre no válido");
            }
        });

        $('#nombre').focus(function() {
            $('#nombre').css({
                "border-color": "" 
            });
            $('#nombre').attr("placeholder", "");
        });

        // Validación para que el campo telefono no acepte números ni se ingresen solo espacios en blanco - ingreso
        $('#telefono').focusout(function(){
            var regex = /^[0-9]{8}$/;
            
            if (!regex.test($('#telefono').val())) {
                $('#telefono').val("");
                $('#telefono').css({
                    "border-color": "red"
                });
                $('#telefono').attr("placeholder", "telefono no válido");
            }
        });

        $('#telefono').focus(function() {
            $('#telefono').css({
                "border-color": "" 
            });
            $('#telefono').attr("placeholder", "");
        });


        //VALIDA LOS FOCUS DEL SEGUNDO MODAL

        // Validación para que el campo usuario no acepte números ni se ingresen solo espacios en blanco - ingreso
        $('#edit_usuario2').focusout(function(){
            var regex = /^[a-zA-Z]+$/;
            
            if (!regex.test($('#edit_usuario2').val())) {
                $('#edit_usuario2').val("");
                $('#edit_usuario2').css({
                    "border-color": "red"
                });
                $('#edit_usuario2').attr("placeholder", "usuario no válido");
            }
        });

        $('#edit_usuario2').focus(function() {
            $('#edit_usuario2').css({
                "border-color": "" 
            });
            $('#edit_usuario2').attr("placeholder", "");
        });
        
        // Validación para que el campo correo no acepte números ni se ingresen solo espacios en blanco - ingreso
        $('#edit_correo2').focusout(function(){
            var regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            
            if (!regex.test($('#edit_correo2').val())) {
                $('#edit_correo2').val("");
                $('#edit_correo2').css({
                    "border-color": "red"
                });
                $('#edit_correo2').attr("placeholder", "correo no válido");
            }
        });

        $('#edit_correo2').focus(function() {
            $('#edit_correo2').css({
                "border-color": "" 
            });
            $('#edit_correo2').attr("placeholder", "");
        });

        // Validación para que el campo nombre no acepte números ni se ingresen solo espacios en blanco - ingreso
        $('#edit_nombre2').focusout(function(){
            var regex = /^[a-zA-Z]+( [a-zA-Z]+)*$/;
            
            if (!regex.test($('#edit_nombre2').val())) {
                $('#edit_nombre2').val("");
                $('#edit_nombre2').css({
                    "border-color": "red"
                });
                $('#edit_nombre2').attr("placeholder", "Nombre no válido");
            }
        });

        $('#edit_nombre2').focus(function() {
            $('#edit_nombre2').css({
                "border-color": "" 
            });
            $('#edit_nombre2').attr("placeholder", "");
        });

        // Validación para que el campo telefono no acepte números ni se ingresen solo espacios en blanco - ingreso
        $('#edit_telefono2').focusout(function(){
            var regex = /^[0-9]{8}$/;
            
            if (!regex.test($('#edit_telefono2').val())) {
                $('#edit_telefono2').val("");
                $('#edit_telefono2').css({
                    "border-color": "red"
                });
                $('#edit_telefono2').attr("placeholder", "telefono no válido");
            }
        });

        $('#edit_telefono2').focus(function() {
            $('#edit_telefono2').css({
                "border-color": "" 
            });
            $('#edit_telefono2').attr("placeholder", "");
        });


</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" 
crossorigin="anonymous"></script>

<?php
$this->load->view('templates/footer');
?>
