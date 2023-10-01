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
                    <label for="NIT">NIT</label>
                    <input type="text" name="numNit" id="NIT">
                    <button type="button" value="Buscar" class="btn btn-primary"  id="btn-buscar" >Buscar</button>
                    <br>
                    <div class="form-group">
                        <label for="fk_producto">Producto</label>    
                        <select class="form-select" name="fk_producto" id="fk_producto" required style="width: 200px;" disabled>
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
                    <!--<form action="<?php echo site_url('VentaController/agregarFac'); ?>" method="POST">
                        <br><br>-->
                            <label for="NombreCliente">Nombre</label>
                            <input type="text" name="NombreCliente" id="NombreCliente"><br>

                            <label for="NitCliente">NIT</label>
                            <input type="text" name="NitCliente" id="NitCliente"><br>

                            <input type="hidden" id="idcliente" name="idcliente"><br>
                            
                            <input type="hidden" name="id_factura" value=""> <!-- SE AGREGA LA FACTURA-->

                            <label for="Factura">No.Factura</label>
                            <input type="text" name="Factura" id="Factura" disabled><br>

                            <label for="Usuario">Usuario</label>
                            <input type="text" name="Usuario" id="Usuario" disabled><br>

                        <br><br>

                        <div tabla-container>
                            <table  id="tabla">
                                <thead>
                                    <tr>
                                        <th>Cantidad</th>
                                        <th hidden>id_producto</th>
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
                        <input type="text" name="Total" id="total" disabled>
                        <br><br>
                        <div>
                            <input type="submit" class="btn btn-primary" value="Realizar Venta" id ="btn-genVenta"></input>
                        </div>
                    <!--</form>-->
                </div>

        </div>
    </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

 <script>
        $(document).ready(function() {
       
        });

        function generarCadenaAleatoria() {
            const caracteresLetras = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            const caracteresNumeros = '0123456789';
            let cadena = '';

            // Genera las dos letras aleatorias
            for (let i = 0; i < 2; i++) {
                const indiceAleatorio = Math.floor(Math.random() * caracteresLetras.length);
                cadena += caracteresLetras.charAt(indiceAleatorio);
            }

            // Genera los cuatro números aleatorios
            for (let i = 0; i < 4; i++) {
                const indiceAleatorio = Math.floor(Math.random() * caracteresNumeros.length);
                cadena += caracteresNumeros.charAt(indiceAleatorio);
            }

            return cadena;
        }
        
        $('#btn-buscar').on('click', function () {
            var NomNit = $('#NIT').val();
            //var Registro = new FormData();
            debugger;
            $.ajax({
                type: "GET",
                url: "<?php echo site_url('VentaController/buscarCliente');?>",
                dataType: "json",
                data: {
                    opcion: NomNit
                },
                success: function(response) {
                    debugger;
                    $("#NombreCliente").val(response.respuesta[0].nombre);
                    $("#NitCliente").val(response.respuesta[0].nit);
                    $("#idcliente").val(response.respuesta[0].id_cliente);

                    $("#Factura").val(generarCadenaAleatoria);

                },
                error: function(xhr) {
                    console.log("Error en la petición");
                }
            });
        });


$("#btn-agregar").click(function(){
    var producto = $("#fk_producto option:selected").text();
    var id_producto = $("#fk_producto").val();
    var precio = $("#costo").val();
    var unidades = $("#V_unidades").val();
    var precioTotalProducto = parseFloat(precio) * parseFloat(unidades);
    debugger;

    // Agregar a la tabla
    var newRow = $("<tr>");
    newRow.append($("<td>").text(unidades));
    newRow.append($("<td hidden>").text(id_producto));
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
    var precio = parseFloat(row.find("td:eq(3)").text());
    debugger;
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
                debugger;
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


    $('#btn-buscar').on('click', function () {
        var NomNit = $('#NIT').val();
        //var Registro = new FormData();
        debugger;
        $.ajax({
            type: "GET",
            url: "<?php echo site_url('VentaController/buscarCliente');?>",
            dataType: "json",
            data: {
                opcion: NomNit
            },
            success: function(response) {
                debugger;
               $("#NombreCliente").val(response.respuesta[0].nombre);
               $("#NitCliente").val(response.respuesta[0].nit);
            },
            error: function(xhr) {
                console.log("Error en la petición");
            }
        });
    });

    $("#btn-genVenta").off('click').on('click',function(){
        facturar();
        detalleFac();
    });

    function facturar(){
        var dato = $("#idcliente").val();
        var noFac = $("#Factura").val();
        debugger;
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('VentaController/insertarEncabezado');?>",
            dataType: "json",
            data:{
                opcion: dato,
                idFac: noFac
            },
            success: function(json){
                
            },
            error: function (error){
                alert("Se agrego factura");
            }
        });
    }

    function detalleFac() {
        // Crear un array para almacenar los datos de la tabla
        var datos = [];

        // Recorrer las filas de la tabla
        $('#tabla tbody tr').each(function () {
            // Obtener las celdas de la fila
            var cantidad = $(this).find('td:nth-child(1)').text();
            var idProducto = $(this).find('td:nth-child(2)').text();
            var descripcion = $(this).find('td:nth-child(3)').text();
            var precioUnitario = $(this).find('td:nth-child(4)').text();
            var subtotal = $(this).find('td:nth-child(5)').text();

            // Verificar si todas las celdas contienen datos antes de agregarlos al objeto
            if (cantidad && descripcion && precioUnitario && subtotal) {
                // Crear un objeto con los datos de la fila y agregarlo al array
                var filaDatos = {
                    cantidad: cantidad,
                    id_producto: idProducto,
                    descripcion: descripcion,
                    precioUnitario: precioUnitario,
                    subtotal: subtotal
                };

                datos.push(filaDatos);
            }
        });

        for (var i = 0; i < datos.length; i++) {
            var fila = datos[i];
            var noFactura = $("#Factura").val();
            var idProducto = fila.id_producto;
            var cantidad = fila.cantidad;
            var precioUnitario = fila.precioUnitario;
            var subtotal = fila.subtotal;
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('VentaController/insertarDetalle');?>",
                dataType: "json",
                data:{
                    factura: noFactura,
                    producto: idProducto,
                    cantidad: cantidad,
                    precio: precioUnitario,
                    total: subtotal
                },
                success: function(json){
                    
                },
                error: function (error){
                    alert("Se agrego factura");
                }
            });
        }
    }

    
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" 
crossorigin="anonymous"></script>

<?php
$this->load->view('templates/footer');
?>
