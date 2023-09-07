<?php
$this->load->view('templates/header');
?>
<h1 class="text-center">Listado de Ventas Realizadas</h1>

    <!-- Segundo modal de edición -->
    <div class="modal fade" id="modalver" tabindex="-1" aria-labelledby="editModal2Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
        
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModal2Label">Detalle de las ventas realizadas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <!-- Campos de edición para el segundo modal -->
                        
                            <div class="form-group">
                                <div style="display: inline-block; width: 100px; margin-right: 10px;">
                                    <label for="nombrev">Nombre</label>
                                </div>
                                <div style="display: inline-block;">
                                    <input type="text" class="form-control" name="nombrev" id="nombrev"  required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div style="display: inline-block; width: 100px; margin-right: 10px;">                                
                                    <label for="nitv">NIT</label>
                                </div>
                                <div style="display: inline-block;">                               
                                    <input type="text" class="form-control" name="nitv" id="nitv" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div style="display: inline-block; width: 100px; margin-right: 10px;">
                                    <label for="no_facturav">No. De Factura</label>
                                </div>
                                <div style="display: inline-block;">
                                    <input type="text" class="form-control" name="no_facturav" id="no_facturav"required >
                                </div>
                            </div>

                            <div class="form-group">
                                <div style="display: inline-block; width: 100px; margin-right: 10px;">  
                                    <label for="edit_unidades">Usuario que realiza la venta</label>
                                </div>
                                <div style="display: inline-block;">   
                                    <input type="text" class="form-control" name="edit_unidades" id="edit_unidades"required >
                                </div>
                            </div>
  
                            <div class="form-group">
                                <label style="text-align: center" for="edit_estado">Detalles del producto vendido</label>
                                <br>
                                <hr>
                                <table class="table table-hover table-bordered table-striped" id="tabla">
                                    <thead>
                                        <tr>
                                            <th>Cantidad</th>
                                            <th>Descripción</th>
                                            <th>Precio</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($facturas as $factura): ?>
                                            <tr>
                                                <td><?php echo $factura->id_factura; ?></td>
                                                <td><?php echo $factura->nombre; ?></td>
                                                <td><?php echo $factura->fecha; ?></td>   
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>  
                            </div>
                            <div class ="from -group" style="display: inline-block; text-align: right;">
                                <input type="hidden" id="Edi" name ="id_producto">
                            </div>
                           
                            <div class="form-group text-right">
                                <div style="display: inline-block;">
                                    <label for="total_gastado">Total Gastado</label>
                                </div>
                                <div style="display: inline-block; text-align: right;">
                                    <input type="text" class="form-controlDetalle" name="total_gastado" id="total_gastado" readonly>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

                    </div>

            </div>
        </div>
    </div>

    <!-- tercer modal de edición -->
    <div class="modal fade" id="AnularModal" tabindex="-1" aria-labelledby="editModal2Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?php echo site_url('DFacturaController/anular'); ?>" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AnularModal">Anular Factura</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Campos de edición para el segundo modal -->
                        <div class="row justify-content-center">
                            <div class="form-group">
                                <label for="TxtAnular">Ingrese la contraseña para anular la factura No. </label>
                                <input type="hiden" id="TxtAnular" name ="TxtAnular" >
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="form-group">
                                <input type="text" id="anular" name="anular">
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" id="btnaceptar">Aceptar</button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">

                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="card">
        <div class="card-body">
            <br>
            <hr>

            <table class="table table-hover table-bordered table-striped" id="tabla">

                <thead>
                    <tr>
                        <th>No. Facturas</th>
                        <th>Cliente</th>
                        <th>Fecha</th>

                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($facturas as $factura): ?>
            <tr>
                <td name="nfactura"><?php echo $factura->id_factura; ?></td>
                <td><?php echo $factura->nombre; ?></td>
                <td><?php echo $factura->fecha; ?></td>
                <td><button  class="btn btn-primary btn-sm btn-ver" onclick="verdata()"  data-bs-toggle="modal" data-bs-target="#modalver"  data-id="<?php echo $factura->id_factura; ?>">Ver</button></td>
                <td><button class="btn btn-danger btn-sm btn-eliminar"   data-bs-toggle="modal" data-bs-target="#AnularModal"  data-id="<?php echo $factura->id_factura; ?>">Anular Factura</button></td>
              
            </tr>
                <?php endforeach; ?>

                </tbody>
            </table>

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(".btn-eliminar").click(function(){
        var id = $(this).data("id");
        $("#TxtAnular").val(id);
    });


</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" 
crossorigin="anonymous"></script>

<script>

$(document).ready(function() {
    //$('.table').DataTable();
});

function verdata() {
    var id = $(this).data("id");
   /* var nombre = $(this).closest("tr").find("td:eq(1)").text();
    var nit = $(this).closest("tr").find("td:eq(2)").text();
    var id_factura = $(this).closest("tr").find("td:eq(0)").text();
   */
    debugger;
    var dato = {
        id: id
    };
    $.ajax({
        type: 'POST', // Puedes utilizar 'GET' si lo prefieres
         url: '<?php echo site_url('DFacturaController/ver'); ?>', // Reemplaza con la URL de tu controlador y método
        data: datos, // Datos a enviar al controlador
        dataType: 'json', // Tipo de datos esperados en la respuesta (puedes ajustarlo según tus necesidades)
        success: function(response) {
                // Manipula la respuesta del controlador aquí
            alert("Funciono");
            console.log(response);
        },
        error: function(error) {
            alert("No funciona");    
            // Maneja los errores de la solicitud AJAX aquí
        console.error(error);
        }
    });
}

$(".btnEliminar").click(function(){
    var id = $(this).data("id");

    $("#hdnEliminar").val(id);
});

$('#nombre').focus(function() {
    $('#nombre').css({
        "border-color": "" 
    });
    $('#nombre').attr("placeholder", "");
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

<?php
$this->load->view('templates/footer');
?>
