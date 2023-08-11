<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Mostrar Datos de Prueba</title>
</head>
<body>
    <h1>Clientes</h1>

    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Ingresar</button>

   
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
                                <input type="text" class="form-control" name="telefono" id="telefono" required>
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
                                    <option value="">Seleccione un estado</option>
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                            </div>
                        
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit">Registrarse</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<div class="modal fade" id="editarModal" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?php echo base_url('ClienteController/guardarEdicion'); ?>" method="post">
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
                            <option value="">Seleccione un estado</option>
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" id="Eid" name="Eid_cliente"/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="eliminarModal" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?php echo base_url('ClienteController/guardarEdicion'); ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarModalLabel">Eliminar Cliente</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label id="lbEditar">¿Esta seguro que desea eliminar de la vista este cliente?</label>
                        <input type="hidden" id="hdnEliminar">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>

    <table class="table table-hover table-bordered table-striped">
        <tr>
            <th>Nombre</th>
            <th>DPI</th>
            <th>Telefono </th>
            <th>Dirección</th>
            <th>NIT</th>
            <th>Estado</th>
            <th></th>
            <th></th>
        </tr>
        <?php foreach ($resultados as $row): ?>
            <tr>
                <td><?php echo $row->nombre; ?></td>
                <td><?php echo $row->dpi; ?></td>
                <td><?php echo $row->telefono; ?></td>
                <td><?php echo $row->direccion; ?></td>
                <td><?php echo $row->nit; ?></td>
                <td><?php echo $row->estado; ?></td>
                <td><button class="btn btn-primary btn-sm btnEditar" data-bs-toggle="modal" data-bs-target="#editarModal" data-id="<?php echo $row->id_cliente; ?>">Editar</button></td>
                <td><button class="btn btn-danger btn-sm btnEliminar" data-bs-toggle="modal" data-bs-target="#eliminarModal" data-id="<?php echo $row->id_cliente; ?>">Eliminar</button></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>

        $(document).ready(function() {
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
                $("#edit_estado").val(estado);
                $("#Eid").val(id);
            });

            $("#btnEliminar").click(function(){
                var id = $(this).data("id");

                $("#btnEliminar").val(id);
            });
        });

    </script>
</body>
</html>