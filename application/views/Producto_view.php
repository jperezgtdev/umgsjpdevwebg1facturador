<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <title>Registro de Producto</title>
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

<div class="d-flex justify-content-center">
            <h1>Registro de  producto</h1>
</div>
    
    <br><br>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Ingresar</button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <form action="<?php echo site_url('ProductoController/insertar'); ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                        <div class="form-group">
                            <label for="id_producto">id_producto</label>
                            <input type="text" class="form-control" name="id_producto" id="id_producto" required autocomplete="id_producto">
                        </div>
                        <div class="form-group">
                            <label for="fk_categoria">fk_categoria</label>
                            <input type="fk_categoria" class="form-control" name="fk_categoria" id="fk_categoria" required autocomplete="fk_categoria">
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="costo">costo</label>
                            <input type="costo" class="form-control" name="costo" id="costo" required>
                        </div>
                        <div class="form-group">
                            <label for="unidades">unidades</label>
                            <input type="unidades" class="form-control" name="unidades" id="unidades" required>
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
            <form action="<?php echo site_url('ProductoController/guardarEdicion '); ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModal2Label">Editar Registro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Campos de edición para el segundo modal -->
     
                    <div class="form-group">
                            <label for="edit_id_producto">id_producto</label>
                            <input type="text" class="form-control" name="edit_id_producto" id="edit_id_producto" required autocomplete="edit_id_producto">
                        </div>
                        <div class="form-group">
                            <label for="edit_fk_categoria">fk_categoria</label>
                            <input type="text" class="form-control" name="edit_fk_categoria" id="edit_fk_categoria" required autocomplete="edit_fk_categoria">
                        </div>
                        <div class="form-group">
                            <label for="edit_nombre">Nombre</label>
                            <input type="text" class="form-control" name="edit_nombre" id="edit_nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_costo">costo</label>
                            <input type="text" class="form-control" name="edit_costo" id="edit_costo" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_unidades">unidades</label>
                            <input type="text" class="form-control" name="edit_unidades" id="edit_unidades" required>
                        </div>

                        <div class="form-group">
                            <label for="edit_estado">estado</label>
                            <select class="form-select" name="edit_estado" id="edit_estado" required>
                                <option value="">seleccione estado</option>
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                        </div>   
                    </div>
                    <div class ="from -group">
                        <input type="hidden" id="Edi" name ="id_producto">
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
            <form action="<?php echo site_url('ProductoController/eliminarUsuario'); ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModal2Label">Eliminar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Campos de edición para el segundo modal -->
     
                    <div class="form-group">
                        <label id="mensaje">¿desea eliminar el producto?</label>
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
                <th>id_producto</th>
                <th>fk_categoria</th>
                <th>nombre</th>
                <th>costo</th>
                <th>unidades</th>
                <th>estado</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach  ($resultados as $row): ?>
            <tr>
                <td><?php echo $row->id_producto; ?></td>
                <td><?php echo $row->fk_categoria; ?></td>
                <td><?php echo $row->nombre; ?></td>
                <td><?php echo $row->costo; ?></td>
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
                var id_producto = $(this).data("id");
                var fk_categoria = $(this).closest("tr").find("td:eq(0)").text();
                var nombre = $(this).closest("tr").find("td:eq(1)").text();
                var costo = $(this).closest("tr").find("td:eq(2)").text();
                var unidades = $(this).closest("tr").find("td:eq(3)").text();
                var estado = $(this).closest("tr").find("td:eq(4)").text();

                $("#edit_usuario2").val(usuario);
                $("#edit_nombre2").val(nombre);
                $("#edit_telefono2").val(telefono);
                $("#edit_correo2").val(correo);
                $("#edit_rol2").val(rol);
                $("#edit_estado").val(estado);
                $("#Edi").val(id_usuario);
                
            });
        });




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
