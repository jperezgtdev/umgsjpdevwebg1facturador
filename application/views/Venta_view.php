<?php
$this->load->view('templates/header');
?>

    <div class="container">
        <div class="d-flex justify-content-center">
            <h1>Venta</h1>
        </div>
        <div class="row">      
                <div class="col-md-5">
                    <br><br>
                    <form action="<?php echo site_url('VentaController/index'); ?>" method="POST">
                                
                            <label for="NIT">NIT</label>
                            <input type="text" name="numNit" id="NIT">
                            <input type="submit" value="Buscar" class="btn btn-primary"  id="btn-buscar" ></input>
                    </form>
                        <br>
                    <div class="form-group">
                        <label for="fk_producto">Producto</label>    
                        <select class="form-select" name="fk_producto" id="fk_producto" required style="width: 200px;">
                            <option value="0">Selecciona un producto</option>
                            <?php foreach($productos as $producto): ?>
                                <option value="<?= $producto->id_producto; ?>"><?= $producto->nombre; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="unidades">Unidades</label>
                        <input type="text" class="form-control" name="unidades" id="unidades" required style="width: 200px;" required disabled>
                    </div>
                    <div class="form-group">
                        <labebl for="costo">costo</labebl>
                        <input type="text" class="form-control" name="costo" id="costo" required style="width: 200px;" required disabled>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="V_unidades">Unidades Venta</label>
                        <input type="number" class="form-control" name="V_unidades" id="V_unidades"  style="width: 200px;" >
                    </div>
                    <br>
                    <button  type="button" class="btn btn-primary" id ="btn-agregar">Agregar</button>
                </div>

                <div class="col-md-6">
                    <form action="<?php echo site_url('VentaController/agregarFac'); ?>" method="POST">
                        <br><br>
                        <?php foreach ($cliente as $cl): ?>
                            <label for="NombreCliente">Nombre</label>
                            <input type="text" name="NombreCliente" id="NombreCliente" disabled value="<?php echo $cl->nombre; ?>"><br>
                            <label for="NitCliente">NIT</label>
                            <input type="text" name="NitCliente" id="NitCliente" disabled value="<?php echo $cl->nit; ?>"><br>
                            <input type="hidden" id="idcliente"  value="<?php echo $cl->id_cliente; ?>" name="idcliente"><br>
                            <input type="hidden" name="id_factura" value="5"> <!-- SE AGREGA LA FACTURA-->
                            <label for="Factura">No.Factura</label>
                            <input type="text" name="Factura" id="Factura" disabled><br>
                            <label for="Usuario">Usuario</label>
                            <input type="text" name="Usuario" id="Usuario" disabled><br>
                        <?php endforeach; ?>

                        <br><br>

                        <div tabla-container>
                            <table class="table table-hover table-bordered table-striped" id="tabla">
                                <thead>
                                    <tr>
                                        <th>Cantidad</th>
                                        <th>Descripcion</th>
                                        <th>Precio Unitario</th>
                                        <th>Subtotal</th>
                                        <th>Elimnar</th>
                                    </tr>
                                </thead>
                                <?php foreach ($productos as $producto): ?>
                                    <tr data-id="<?= $producto->id_producto; ?>">
                                        
                                        
                                        <!--<td><button class="btn btn-danger btn-sm btn-eliminar" data-bs-toggle="modal" data-bs-target="#eliminarModal"  data-id="<?php echo $row->id_usuario; ?>"   >Eliminar</button></td>-->
                                    </tr>
                                <?php endforeach;?>  
                            </table>
                        </div>
                    
                        <br><br>
                        <Label for="Total">Total</Label>
                        <input type="text" name="Total" disabled>
                        <br><br>
                        <div>
                            <input type="submit" class="btn btn-primary" value="Realizar Venta" id ="btn-genVenta"></input>
                        </div>
                    </form>
                </div>

        </div>
    </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

 <script>
        $(document).ready(function() {
       
        });
        
        function BuscarPorNit() {
        $.ajax({
            type: "GET",
            url: "<?php echo base_url('VentaController/buscar');?>",
            dataType: "json",
            data: {
                NIT: $("#NIT").val()
            },
            success: function(response) {
                try {
                    if (response.nombre && response.nit && response.id_cliente) {
                        $("#NombreCliente").val(response.nombre);
                        $("#NitCliente").val(response.nit);
                        $("#idcliente").val(response.id_cliente);
                    } else {
                        // Si no se encontraron datos, puedes mostrar un mensaje o realizar otra acción.
                        console.log("No se encontraron datos.");
                    }
                } catch (error) {
                    console.log("Error en el manejo de la respuesta JSON:", error);
                }
            },
            error: function(xhr, textStatus, errorThrown) {
                console.log("Error en la petición AJAX:");
                console.log('textStatus:', textStatus);
                console.log('errorThrown:', errorThrown);
            }
        });
    };


$("#btn-agregar").click(function(){
    var producto = $("#fk_producto option:selected").text();
    var precio = $("#costo").val();
    var unidades = $("#V_unidades").val();
    var precioTotalProducto = parseFloat(precio) * parseFloat(unidades);
    debugger;

    // Agregar a la tabla
    var newRow = $("<tr>");
    newRow.append($("<td>").text(unidades));
    newRow.append($("<td>").text(producto));
    newRow.append($("<td>").text(precio));
    newRow.append($("<td>").text(precioTotalProducto));
    newRow.append($("<td><button class='btn btn-danger btn-eliminar' id='btnEliminar' onclick='eliminar()'>Eliminar</button></td>"));
    $("#tabla").append(newRow);

   
    // Actualizar el Total
    var totalActual = parseFloat($("[name='Total']").val()) || 0;
    totalActual += precioTotalProducto;
    $("[name='Total']").val(totalActual);


});


function eliminar() {

    var row = $("#btnEliminar").closest("tr");
    var precio = parseFloat(row.find("td:eq(2)").text());

    // Restar el precio de la fila eliminada del total
    var totalActual = parseFloat($("[name='Total']").val()) || 0;
    totalActual -= precio;
    $("[name='Total']").val(totalActual);

    // Eliminar la fila
    row.remove();
}

// Asignar la función eliminar() al evento click del botón #btnEliminar
$("#btnEliminar").click(eliminar);



$("#fk_producto").change(function(){
    var opcionSeleccionada = $("#fk_producto").val();
        $.ajax({
            type: "GET",
            url: "<?php echo site_url('VentaController/buscarProducto');?>",
            dataType: "json",
            data: {
                opcion: opcionSeleccionada
            },
            success: function(response) {
               $("#unidades").val(response.respuesta[0].unidades);
               $("#costo").val(response.respuesta[0].costo);
            },
            error: function(xhr) {
                console.log("Error en la petición");
            }
        });
});

    
        //Validación las unidades disponibles
    $('#V_unidades').focusout(function(){
       var existencias=$('#unidades').val();
       var solicitadas=$('#V_unidades').val();
       debugger;
        console.log($('#V_unidades').val());
       if (parseInt(existencias)  < parseInt(solicitadas) ){
            $('#V_unidades').val("");
            $('#V_unidades').css({
               "border-color": "red"
           });
           $('#V_unidades').attr("placeholder", "Uniades no disponibles");
        }
   });

   $('#V_unidades').focus(function() {
            $('#V_unidades').css({
                "border-color": "" 
            });
            $('#V_unidades').val("");
            $('#V_unidades').attr("placeholder", "");
        });


  

    
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" 
crossorigin="anonymous"></script>

<?php
$this->load->view('templates/footer');
?>
