<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <title>Producto</title>
</head>
<body>

    <button type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample" class="btn btn-primary d-flex align-items-center">
        <img src="<?php echo base_url('imagenes/menu.png'); ?>" style="width: 30px; height: 30px; margin-right: 10px;" class="mr-1" alt="Menú">
        Abrir Menú
    </button>

    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" style="width: 200px; background-color: #0c1375!important;">
        <div class="offcanvas-header  text-white" style="background-color: #ffffff;">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel" style="color: #030000;">Menú</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body" style="background-color: #0c1375;">
            <div class="text-center">
            <p><a href="<?= site_url('ClienteController/index')?>" class="text-white"><img src="<?php echo base_url('imagenes/cliente.png'); ?>" style="width: 30px; height: 30px; margin-right: 10px;" class="mr-1">Clientes</a></p>
            </div>
            <div class="text-center">   
            <p><a href="<?= site_url('usuario/index')?>" class="text-white"><img src="<?php echo base_url('imagenes/usuario.png'); ?>" style="width: 30px; height: 30px; margin-right: 10px;" class="mr-1">Usuarios</a></p>
            </div>
            <div class="text-center">
            <p><a href="<?= site_url('ProductoController/index')?>" class="text-white"><img src="<?php echo base_url('imagenes/producto.png'); ?>" style="width: 30px; height: 30px; margin-right: 10px;" class="mr-1">Usuarios</a></p>
            </div>
        </div>
    </div>

<div class="container">
        <div class="d-flex justify-content-center">
            <h1>Producto</h1>
        </div>
    
    <br>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Ingresar</button>
    <br><br>
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
                            <label for="fk_categoria">fk_categoria</label>
                            <input type="text" class="form-control" name="fk_categoria" id="fk_categoria" required >
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="costo">costo</label>
                            <input type="text" class="form-control" name="costo" id="costo" required>
                        </div>
                        <div class="form-group">
                            <label for="unidades">unidades</label>
                            <input type="text" class="form-control" name="unidades" id="unidades" required>
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
                            <label for="edit_fk_categoria">fk_categoria</label>
                            <input type="text" class="form-control" name="edit_fk_categoria" id="edit_fk_categoria"required >
                        </div>
                        <div class="form-group">
                            <label for="edit_nombre">Nombre</label>
                            <input type="text" class="form-control" name="edit_nombre" id="edit_nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_costo">costo</label>
                            <input type="text" class="form-control" name="edit_costo" id="edit_costo"required >
                        </div>
                        <div class="form-group">
                            <label for="edit_unidades">unidades</label>
                            <input type="text" class="form-control" name="edit_unidades" id="edit_unidades"required >
                        </div>

                        <div class="form-group">
                            <label for="edit_estado">Estado</label>
                            <select class="form-select" name="edit_estado" id="edit_estado" >
                            <option value="3">Seleccione un estado</option>
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
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
                <form action="<?php echo site_url('ProductoController/eliminarProducto'); ?>" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModal2Label">Eliminar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Campos de edición para el segundo modal -->
        
                        <div class="form-group">
                            <label id="mensaje">¿desea eliminar el producto?</label>
                            <input type="hidden" name ="mEliminar" id="hdnEliminar">

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
                    <th>Categoria</th>
                    <th>Nombre</th>
                    <th>Costo</th>
                    <th>Unidades</th>
                    <th>Estado</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach  ($resultados as $row): ?>
                <tr>
                
                    <td><?php echo $row->fk_categoria; ?></td>
                    <td><?php echo $row->nombre; ?></td>
                    <td><?php echo $row->costo; ?></td>
                    <td><?php echo $row->unidades; ?></td>
                    <td><?php echo $row->estado; ?></td>
                    <td><button class="btn btn-primary btn-sm btn-editar"   data-bs-toggle="modal" data-bs-target="#editModal2"  data-id="<?php echo $row->id_producto; ?>">Editar</button></td>
                    <td><button class="btn btn-danger btn-sm btn-eliminar"   data-bs-toggle="modal" data-bs-target="#eliminarModal"  data-id="<?php echo $row->id_producto; ?>"   >Eliminar</button></td>
                </tr>
            <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

        $(document).ready(function() {
            //$('.table').DataTable();
        });

        $(".btnEditar").click(function() {
            var id_producto = $(this).data("id");
            var fk_categoria = $(this).closest("tr").find("td:eq(0)").text();
            var nombre = $(this).closest("tr").find("td:eq(1)").text();
            var costo = $(this).closest("tr").find("td:eq(2)").text();
            var unidades = $(this).closest("tr").find("td:eq(3)").text();
            var estado = $(this).closest("tr").find("td:eq(5)").text();

            $("#edit_id_producto").val(id_producto);
            $("#edit_fk_categoria").val(fk_categoria);
            $("#edit_nombre").val(nombre);
            $("#edit_costo").val(costo);
            $("#edit_unidades").val(unidades);
            if(estado == 'Activo'){
                $("#edit_estado").val(1);
            }else if(estado == 'Inactivo'){
                $("#edit_estado").val(0);
            }else{
                $("#edit_estado").val(3);
            }
            $("#Eid").val(id);
        });

        $(".btn-eliminar").click(function(){
            var id = $(this).data("id");
debugger;
            $("#hdnEliminar").val(id);
        });
        

        $("#btnGuardarEditar").click(function(){
            alert("Se ha modificado con exito el cliente");
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

        
        //Validación para costo - ingreso
        $('#costo').focusout(function(){
            var regex = /^[0-9]{8}$/;
            if (!regex.test($('#costo').val())) {
                $("#costo").val("");
                $('#costo').css({
                    "border-color": "red"
                });
                $('#costo').attr("placeholder", "Costo no válido");
            }
        });

        $('#costo').focus(function() {
            $('#costo').css({
                "border-color": "" 
            });
            $('#costo').attr("placeholder", "");
        });


        //Validación para unidades - ingreso
                $('#unidades').focusout(function(){
            var regex = /^[0-9]{8}$/;
            if (!regex.test($('#unidades').val())) {
                $("#unidades").val("");
                $('#unidades').css({
                    "border-color": "red"
                });
                $('#unidades').attr("placeholder", "Unidades no válido");
            }
        });

        $('#unidades').focus(function() {
            $('#unidades').css({
                "border-color": "" 
            });
            $('#unidades').attr("placeholder", "");
        });


        
 // Validación para que el campo nombre no acepte números ni se ingresen solo espacios en blanco - editar
        $('#edit_nombre').focusout(function(){
            var regex = /^[a-zA-Z]+( [a-zA-Z]+)*$/;
            
            if (!regex.test($('#edit_nombre').val())) {
                $('#edit_nombre').val("");
                $('#edit_nombre').css({
                    "border-color": "red"
                });
                $('#edit_nombre').attr("placeholder", "Nombre no válido");
            }
        });

        $('#edit_nombre').focus(function() {
            $('#edit_nombre').css({
                "border-color": "" 
            });
            $('#edit_nombre').attr("placeholder", "");
        });

        
        //Validación para costo - ingreso
        $('#edit_costo').focusout(function(){
            var regex = /^[0-9]{8}$/;
            if (!regex.test($('#edit_costo').val())) {
                $("#edit_costo").val("");
                $('#edit_costo').css({
                    "border-color": "red"
                });
                $('#edit_costo').attr("placeholder", "Costo no válido");
            }
        });

        $('#edit_costo').focus(function() {
            $('#edit_costo').css({
                "border-color": "" 
            });
            $('#edit_costo').attr("placeholder", "");
        });


        //Validación para unidades - ingreso
                $('#edit_unidades').focusout(function(){
            var regex = /^[0-9]{8}$/;
            if (!regex.test($('#edit_unidades').val())) {
                $("#edit_unidades").val("");
                $('#edit_unidades').css({
                    "border-color": "red"
                });
                $('#edit_unidades').attr("placeholder", "Unidades no válido");
            }
        });

        $('#edit_unidades').focus(function() {
            $('#edit_unidades').css({
                "border-color": "" 
            });
            $('#edit_unidades').attr("placeholder", "");
        });


    </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" 
crossorigin="anonymous"></script>
</body>
</html>
