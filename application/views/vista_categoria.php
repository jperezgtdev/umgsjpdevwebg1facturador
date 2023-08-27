
<?php
$this->load->view('templates/header');
?>

<div class="container">  
    <br>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Agregar Categoria</button>
    <br><br>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <form action="<?php echo site_url('controlador_categoria/insertar'); ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nueva Categoria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" required>
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
                <form action="<?php echo site_url('controlador_categoria/guardarEdicion'); ?>" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModal2Label">Editar Categoria</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Campos de edición para el segundo modal -->

                        <div class="form-group">
                            <label for="edit_nombre">Nombre</label>
                            <input type="text" class="form-control" name="edit_nombre" id="edit_nombre2" required>
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
                            <input type="hidden" id="Edi" name ="id_categoria">
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
                <form action="<?php echo site_url('controlador_categoria/eliminarCategoria'); ?>" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModal2Label">Eliminar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Campos de edición para el segundo modal -->
        
                        <div class="form-group">
                            <label id="mensaje">¿desea eliminar la categoria?</label>
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
            <h1 class="card-title" style="font-weight: bold; font-size: 20px;ss">Categoria de Productos</h1>
            <br>
            <hr>
            <table class="table table-hover table-bordered table-striped" id="tabla">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Estado</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach  ($resultados as $row): ?>
                    <tr>
                        <td><?php echo $row->nombre; ?></td>
                        <td><?php echo $row->estado; ?></td>
                        <td><button class="btn btn-primary btn-sm btn-editar"   data-bs-toggle="modal" data-bs-target="#editModal2"  data-id="<?php echo $row->id_categoria; ?>">Editar</button></td>
                        <td><button class="btn btn-danger btn-sm btn-eliminar"   data-bs-toggle="modal" data-bs-target="#eliminarModal"  data-id="<?php echo $row->id_categoria; ?>"   >Eliminar</button></td>
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
        var id_categoria = $(this).data("id");
        var nombre = $(this).closest("tr").find("td:eq(0)").text();
        var estado = $(this).closest("tr").find("td:eq(1)").text();
        debugger;
        $("#edit_nombre2").val(nombre);
        if(estado == 'Activo'){
            $("#edit_estado2").val(1);
        }else if(estado == 'Inactivo'){
            $("#edit_estado2").val(0);
        }else{
            $("#edit_estado2").val(3);
        }
        $("#Edi").val(id_categoria);
                
    });


//eliminado logico
    $(".btn-eliminar").click(function() {
        var c = $(this).data("id");
        $("#mensaje_id").val(c);
    });
//VALIDA LOS FOCUS DEL PRIMER MODAL


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


        //VALIDA LOS FOCUS DEL SEGUNDO MODAL

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

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" 
crossorigin="anonymous"></script>

<?php
$this->load->view('templates/footer');
?>
