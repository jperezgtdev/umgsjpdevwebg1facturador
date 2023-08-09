<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <title>Formulario de Registro</title>
</head>
<body>

<!-- Botón para desplegar la barra lateral -->
<button class="btn btn-primary mt-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
    Opciones
</button>

<!-- Offcanvas -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header bg-primary">
        <h5 class="offcanvas-title text-white" id="offcanvasExampleLabel">Opciones</h5>
        <button type="button" class="btn-close text-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body bg-light">
        <div class="text-center">
            <p>Opciones.</p>
        </div>
    </div>
</div>

<div class="container">
    <h1>Formulario de Registro</h1>
    
    <br><br>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Ingresar</button>

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
                            <input type="tel" class="form-control" name="telefono" id="telefono" required>
                        </div>
                        <div class="form-group">
                            <label for="rol">Rol</label>
                            <select class="form-select" name="fk_rol" id="rol" required>
                            <option value="0">seleccion un rol</option>
                                <option value="1">Administrador</option>
                                <option value="2">Operador</option>
                                <option value="3">IT</option>
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
                        <input type="text" class="form-control" name="edit_usuario" id="edit_usuario2" >
                    </div>
                    <div class="form-group">
                        <label for="edit_correo">Correo</label>
                        <input type="email" class="form-control" name="edit_correo" id="edit_correo2" >
                    </div>
                    <div class="form-group">
                        <label for="edit_nombre">Nombre</label>
                        <input type="text" class="form-control" name="edit_nombre" id="edit_nombre2" >
                    </div>
                    <div class="form-group">
                        <label for="edit_telefono">Teléfono</label>
                        <input type="tel" class="form-control" name="edit_telefono" id="edit_telefono2" >
                    </div>
                    <div class="form-group">
                        <label for="edit_rol">Rol</label>
                        <select class="form-select" name="edit_fk_rol" id="edit_rol2" >
                            <option value="1">Administrador</option>
                            <option value="2">Operador</option>
                            <option value="3">IT</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit_estado">Estado</label>
                        <select class="form-select" name="edit_estado" id="edit_estado2" >
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



    <div id="tabla-container">
    <table class="table table-hover table-bordered table-striped" id="tabla">
        <thead>
            <tr>
                <th>usuario</th>
                <th>nombre</th>
                <th>telefono</th>
                <th>correo</th>
                <th>rol</th>
                <th>estado</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach  ($resultados as $row): ?>
            <tr>
                <td><?php echo $row->usuario; ?></td>
                <td><?php echo $row->nombre; ?></td>
                <td><?php echo $row->telefono; ?></td>
                <td><?php echo $row->correo; ?></td>
                <td><?php echo $row->fk_rol; ?></td>
                <td><?php echo $row->estado; ?></td>
                

                <td><button class="btn btn-primary btn-sm btn-editar"   data-bs-toggle="modal" data-bs-target="#editModal2"  data-id="<?php echo $row->id_usuario; ?>">Editar</button></td>
                <td><button class="btn btn-danger btn-sm btn-eliminar"   data-bs-toggle="modal" data-bs-target="#eliminarModal"  data-id="<?php echo $row->id_usuario; ?>"   >Eliminar</button></td>
      </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
</div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
            $(".btn-editar").click(function() {

                console.log("Botón Editar clickeado");
                var id_usuario = $(this).data("id");
                var usuario = $(this).closest("tr").find("td:eq(0)").text();
                var nombre = $(this).closest("tr").find("td:eq(1)").text();
                var telefono = $(this).closest("tr").find("td:eq(2)").text();
                var correo = $(this).closest("tr").find("td:eq(3)").text();
                var rol = $(this).closest("tr").find("td:eq(4)").text();
                var estado = $(this).closest("tr").find("td:eq(5)").text();

                $("#edit_usuario2").val(usuario);
                $("#edit_nombre2").val(nombre);
                $("#edit_telefono2").val(telefono);
                $("#edit_correo2").val(correo);
                $("#edit_rol2").val(rol);
                $("#edit_estado").val(estado);
                $("#Edi").val(id_usuario);
                
            });
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
</script>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" 
crossorigin="anonymous"></script>
</body>
</html>
