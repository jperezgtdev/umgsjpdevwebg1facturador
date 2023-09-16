<?php
$this->load->view('templates/header');
?>
    <div class="container">
        <br>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="<?php echo site_url('ClienteController/insertar'); ?>" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Registro</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" id="nombre" required autocomplete="usuario">
                                </div>
                                <div class="form-group">
                                    <label for="dpi">DPI</label>
                                    <input type="text" class="form-control" name="dpi" id="dpi" required autocomplete="dpi">
                                </div>
                                <div class="form-group">
                                    <label for="telefono">Telefono</label>
                                    <input type="number" class="form-control" name="telefono" id="telefono" required>
                                </div>
                                <div class="form-group">
                                    <label for="direccion">Direccion</label>
                                    <input type="text" class="form-control" name="direccion" id="direccion" required>
                                </div>
                                <div class="form-group">
                                    <label for="nit">NIT</label>
                                    <input type="text" class="form-control" name="nit" id="nit" required>
                                </div>
                                <div class="form-group">
                                    <label for="estado">Estado</label>
                                    <select class="form-select" name="estado" id="estado" required>
                                        <option value="3">Seleccione un estado</option>
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Registrarse</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editarModal" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?php echo site_url('ClienteController/guardarEdicion'); ?>" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editarModalLabel">Editar Cliente</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="edit_nombre">Nombre</label>
                            <input type="text" class="form-control" id="edit_nombre" name="edit_nombre">
                        </div>
                        <div class="form-group">
                            <label for="edit_dpi">DPI</label>
                            <input type="text" class="form-control" id="edit_dpi" name="edit_dpi">
                        </div>
                        <div class="form-group">
                            <label for="edit_telefono">Teléfono</label>
                            <input type="text" class="form-control" id="edit_telefono" name="edit_telefono">
                        </div>
                        <div class="form-group">
                            <label for="edit_direccion">Dirección</label>
                            <input type="text" class="form-control" id="edit_direccion" name="edit_direccion">
                        </div>
                        <div class="form-group">
                            <label for="edit_nit">NIT</label>
                            <input type="text" class="form-control" id="edit_nit" name="edit_nit">
                        </div>
                        <div class="form-group">
                            <label for="edit_estado">Estado</label>
                            <select class="form-select" name="edit_estado" id="edit_estado" required>
                                <option value="3">Seleccione un estado</option>
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="hidden" id="Eid" name="Eid_cliente"/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" id="btnGuardarEditar" data-bs-dismiss="modal">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
        </div>

        <div class="modal fade" id="eliminarModal" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="<?php echo site_url('ClienteController/eliminarCliente'); ?>" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editarModalLabel">Eliminar Cliente</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label id="lbEditar">¿Esta seguro que desea eliminar de la vista este cliente?</label>
                            <input type="hidden" id="hdnEliminar" name="hdnEliminar">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Eliminar</button>
                    </div>
                </form>
            </div>
        </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h1 class="card-title" style="font-weight: bold; font-size: 20px;">Clientes</h1>
                <button class="btn btn-primary" style="float: right;" data-bs-toggle="modal" data-bs-target="#exampleModal">Agregar Cliente</button>
                <br>
                <hr>
                <table class="table table-hover table-bordered table-striped" id="tabla">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>DPI</th>
                            <th>Telefono</th>
                            <th>Dirección</th>
                            <th>NIT</th>
                            <th>Estado</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($resultados as $row): ?>
                            <tr>
                                <td><?php echo $row->nombre; ?></td>
                                <td><?php echo $row->dpi; ?></td>
                                <td><?php echo $row->telefono; ?></td>
                                <td><?php echo $row->direccion; ?></td>
                                <td><?php echo $row->nit; ?></td>
                                <td><?php echo $row->estado; ?></td>
                                <td><button class="btn btn-primary btn-sm btnEditar" onclick="" data-bs-toggle="modal" data-bs-target="#editarModal" data-id="<?php echo $row->id_cliente; ?>">Editar</button></td>
                                <td><button class="btn btn-danger btn-sm btnEliminar" data-bs-toggle="modal" data-bs-target="#eliminarModal" data-id="<?php echo $row->id_cliente; ?>">Eliminar</button></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    
    <script>

        $(document).ready(function() {
           
        });

        $(".btnEditar").click(function() {
            var id = $(this).data("id");
            var nombre = $(this).closest("tr").find("td:eq(0)").text();
            var dpi = $(this).closest("tr").find("td:eq(1)").text();
            var telefono = $(this).closest("tr").find("td:eq(2)").text();
            var direccion = $(this).closest("tr").find("td:eq(3)").text();
            var nit = $(this).closest("tr").find("td:eq(4)").text();
            var estado = $(this).closest("tr").find("td:eq(5)").text();

            $("#edit_nombre").val(nombre);
            $("#edit_dpi").val(dpi);
            $("#edit_telefono").val(telefono);
            $("#edit_direccion").val(direccion);
            $("#edit_nit").val(nit);
            if(estado == 'Activo'){
                $("#edit_estado").val(1);
            }else if(estado == 'Inactivo'){
                $("#edit_estado").val(0);
            }else{
                $("#edit_estado").val(3);
            }
            $("#Eid").val(id);
        });

        $(".btnEliminar").click(function(){
            var id = $(this).data("id");

            $("#hdnEliminar").val(id);
        });

        $("#btnGuardarEditar").click(function(){
            //alert("Se ha modificado con exito el cliente");
            if(camposEstanLlenos("fEditarCliente") && $("#edit_estado").val() != 3){
                $("#fEditarCliente").submit();
                alert("Se ha modificado con exito el cliente");
            }else{
                alert("Debe completar todos los campos y seleccionar un estado valido");
            }
        });

        $("#btnRegistrarse").click(function(){
            if(camposEstanLlenos("fRegistroCliente") && $("#estado").val() != 3){
                $("#fRegistroCliente").submit();
                alert("Se ha registrado con exito el cliente");
            }else{
                alert("Debe completar todos los campos y seleccionar un estado valido");
            }
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

        //validación para el campo de DPI - ingreso
        $('#dpi').focusout(function(){
            var regex = /^[0-9]{13}$/;
            if (!regex.test($('#dpi').val())) {
                $("#dpi").val("");
                $('#dpi').css({
                    "border-color": "red"
                });
                $('#dpi').attr("placeholder", "DPI no válido");
            }
        });

        $('#dpi').focus(function() {
            $('#dpi').css({
                "border-color": "" 
            });
            $('#dpi').attr("placeholder", "");
        });

        //Validación para telefono - ingreso
        $('#telefono').focusout(function(){
            var regex = /^[0-9]{8}$/;
            if (!regex.test($('#telefono').val())) {
                $("#telefono").val("");
                $('#telefono').css({
                    "border-color": "red"
                });
                $('#telefono').attr("placeholder", "Teléfono no válido");
            }
        });

        $('#telefono').focus(function() {
            $('#telefono').css({
                "border-color": "" 
            });
            $('#telefono').attr("placeholder", "");
        });

        //Validación para dirección - ingreso
        $('#direccion').focusout(function(){
            var regex = /^[a-zA-Z0-9\s\.,#-]+$/;
            if (!regex.test($('#direccion').val())) {
                $("#direccion").val("");
                $('#direccion').css({
                    "border-color": "red"
                });
                $('#direccion').attr("placeholder", "Dirección no válido");
            }
        });

        $('#direccion').focus(function() {
            $('#direccion').css({
                "border-color": "" 
            });
            $('#direccion').attr("placeholder", "");
        });

        //Validación para nit - ingreso
        $('#nit').focusout(function(){
            var regex = /^[0-9]{6}$/;
            if (!regex.test($('#nit').val())) {
                $("#nit").val("");
                $('#nit').css({
                    "border-color": "red"
                });
                $('#nit').attr("placeholder", "NIT no válido");
            }
        });

        $('#nit').focus(function() {
            $('#nit').css({
                "border-color": "" 
            });
            $('#nit').attr("placeholder", "");
        });

        //Validación estado - ingreso
        $("#estado").focusout(function(){
            if($("#estado").val() == 3){
                $('#estado').css({
                    "border-color": "red"
                });
            }
        });

        $('#estado').focus(function() {
            $('#estado').css({
                "border-color": "" 
            });
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

        //validación para el campo de DPI - editar
        $('#edit_dpi').focusout(function(){
            var regex = /^[0-9]{13}$/;
            if (!regex.test($('#edit_dpi').val())) {
                $("#edit_dpi").val("");
                $('#edit_dpi').css({
                    "border-color": "red"
                });
                $('#edit_dpi').attr("placeholder", "DPI no válido");
            }
        });

        $('#edit_dpi').focus(function() {
            $('#edit_dpi').css({
                "border-color": "" 
            });
            $('#edit_dpi').attr("placeholder", "");
        });

        //Validación para telefono - editar
        $('#edit_telefono').focusout(function(){
            var regex = /^[0-9]{8}$/;
            if (!regex.test($('#edit_telefono').val())) {
                $("#edit_telefono").val("");
                $('#edit_telefono').css({
                    "border-color": "red"
                });
                $('#edit_telefono').attr("placeholder", "Teléfono no válido");
            }
        });

        $('#edit_telefono').focus(function() {
            $('#edit_telefono').css({
                "border-color": "" 
            });
            $('#edit_telefono').attr("placeholder", "");
        });

        //Validación para dirección - editar
        $('#edit_direccion').focusout(function(){
            var regex = /^[a-zA-Z0-9\s\.,#-]+$/;
            if (!regex.test($('#edit_direccion').val())) {
                $("#edit_direccion").val("");
                $('#edit_direccion').css({
                    "border-color": "red"
                });
                $('#edit_direccion').attr("placeholder", "Dirección no válido");
            }
        });

        $('#edit_direccion').focus(function() {
            $('#edit_direccion').css({
                "border-color": "" 
            });
            $('#edit_direccion').attr("placeholder", "");
        });

        //Validación para nit - editar
        $('#edit_nit').focusout(function(){
            var regex = /^[0-9]{6}$/;
            if (!regex.test($('#edit_nit').val())) {
                $("#edit_nit").val("");
                $('#edit_nit').css({
                    "border-color": "red"
                });
                $('#edit_nit').attr("placeholder", "NIT no válido");
            }
        });

        $('#edit_nit').focus(function() {
            $('#edit_nit').css({
                "border-color": "" 
            });
            $('#edit_nit').attr("placeholder", "");
        });

        //Validación estado - editar
        $("#edit_estado").focusout(function(){
            if($("#edit_estado").val() == 3){
                $('#edit_estado').css({
                    "border-color": "red"
                });
            }
        });

        $('#edit_estado').focus(function() {
            $('#edit_estado').css({
                "border-color": "" 
            });
        });

        $('#editarModal').on('hidden.bs.modal', function () {
            $('#edit_nombre, #edit_dpi, #edit_telefono, #edit_direccion, #edit_nit, #edit_estado').css({
                "border-color": ""
            }).val(""); 
        });

        $('#exampleModal').on('hidden.bs.modal', function () {
            $('#nombre, #dpi, #telefono, #direccion, #nit, #estado').css({
                "border-color": ""
            }).val(""); 
        });

        function Alerta() {
            debugger;
            var alertDiv = document.createElement('div');
            alertDiv.classList.add('alert', 'alert-success', 'mt-3');
            alertDiv.textContent = '¡Alerta de Bootstrap!';

            document.querySelector('.container').appendChild(alertDiv);

            setTimeout(function() {
                alertDiv.remove();
            }, 700); 
        }
    </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" 
crossorigin="anonymous"></script>

<?php
$this->load->view('templates/footer');
?>
