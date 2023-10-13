<!DOCTYPE html>
<html>
<head>
    <style>
        label {
            display: block; /* Hace que las etiquetas ocupen una línea completa */
            margin-bottom: 5px; /* Agrega un espacio entre las etiquetas */
            font-weight: bold; /* Hace que las etiquetas sean negritas */
        }


        /* Estilo para los campos de entrada (input) */
        input[type="text"] {
            width: 50%; /* Ajusta el ancho de los campos de entrada al 50% del contenedor */
            padding: 5px; /* Agrega espacio interno para el contenido del campo */
            margin-bottom: 10px; /* Agrega un espacio entre los campos */
            border: 1px solid #ccc; /* Agrega un borde gris claro alrededor de los campos */
            border-radius: 4px; /* Agrega bordes redondeados a los campos */
        }

        /* Estilo para los campos de entrada deshabilitados (disabled) */
        input[type="text"][disabled] {
            background-color: #f5f5f5; /* Cambia el color de fondo de los campos deshabilitados */
        }
        /* Estilo para las etiquetas <th> en el encabezado de la tabla */
        thead th {
            background-color: #00366e; /* Color azul similar al botón btn-primary */
            color: #fff; /* Color del texto en blanco para contrastar con el fondo */
            text-align: center; /* Alineación de texto al centro */
            padding: 10px; /* Espacio interno alrededor del contenido del encabezado */
            border: 1px solid #ccc; /* Borde alrededor del encabezado */
            font-weight: bold; /* Texto en negritas */
        }

        /* Estilo para las etiquetas <th> ocultas */
        thead th[hidden] {
            display: none; /* Oculta las etiquetas <th> con el atributo hidden */
        }

        .fila-tabla {
            background-color: #f9f9f9; /* Color de fondo de las filas */
        }

        /* Estilo para las celdas de botones en las filas de la tabla */
        .fila-tabla .btn-eliminar {
            background-color: #dc3545; /* Color de fondo del botón */
            color: #fff; /* Color del texto en el botón */
            border: none; /* Quita el borde del botón */
            padding: 5px 10px; /* Espacio interno del botón */
            cursor: pointer; /* Cambia el cursor al pasar por encima del botón */
        }

        /* Estilo para las celdas de botones en las filas de la tabla al pasar el cursor */
        .fila-tabla .btn-eliminar:hover {
            background-color: #c82333; /* Cambia el color de fondo del botón al pasar el cursor */
        }

    </style>
</head>
</html>


<?php
$this->load->view('templates/header');
?>
<div class="container">
    <div class="card" style="margin-top: 10px; width: 760x;">
        <div class="card-body">
            <h1 style="text-align: center; font-weight: bold;">Venta</h1>
            <div class="row">      
                <div class="col-md-6">
                    <br><br>
                    <hr>
                    <label for="NIT">NIT</label><br>
                    <input type="text" name="numNit" id="NIT">
                    <button type="button" value="Buscar" class="btn btn-primary"  id="btn-buscar" >Buscar</button>
                    <br>
                    <br>
                    <div class="form-group">
                        <label for="fk_producto">Producto</label>    
                        <select class="form-select" name="fk_producto" id="fk_producto" required style="width: 200px;"disabled>
                            <option value="0">Selecciona un producto</option>
                            <?php foreach($productos as $producto): ?>
                                <option value="<?= $producto->id_producto; ?>"><?= $producto->nombre; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <hr>
                    </div>
                    
                    <div class="form-group">
                        <label for="unidades">Unidades</label>
                        <input type="text" class="form-control" name="unidades" id="unidades" required style="width: 200px;" required disabled>
                    </div>
                    <div class="form-group">
                        <label for="costo">Costo</label>
                        <input type="text" class="form-control" name="costo" id="costo" required style="width: 200px;" required disabled>
                    </div>
                    
                    <div class="form-group">
                        <label for="V_unidades">Unidades Venta</label>
                        <input type="text" class="form-control" name="V_unidades" id="V_unidades"  style="width: 200px;" disabled>
                    </div>
                    
                    <button  type="button" class="btn btn-primary" id ="btn-agregar" disabled>Agregar</button>
                </div>

                <div class="col-md-6">
                    <!--<form action="<?php echo site_url('VentaController/agregarFac'); ?>" method="POST">
                        <br><br>-->
                        <br>
                        <h5>Datos del cliente</h5>
                        <hr>
                        <br>
                            <label for="NombreCliente">Nombre</label><br>
                            <input type="text" name="NombreCliente" id="NombreCliente" disabled><br>

                            <label for="NitCliente">NIT</label><br>
                            <input type="text" name="NitCliente" id="NitCliente" disabled><br>

                            <input type="hidden" id="idcliente" name="idcliente"><br>
                            
                            <input type="hidden" name="id_factura" value=""> <!-- SE AGREGA LA FACTURA-->

                            <label for="Factura">No.Factura</label><br>
                            <input type="text" name="Factura" id="Factura" disabled><br>

                            <label for="Usuario">Usuario</label><br>
                            <input type="text" name="Usuario" id="Usuario" disabled><br>
                            <hr>

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
                    
                        <br>
                        <Label for="Total">Total</Label><br>
                        <input type="text" name="Total" id="total" disabled>
                        <br><br>
                        <div>
                            <input type="submit" class="btn btn-primary" value="Realizar Venta" id ="btn-genVenta" disabled></input>
                            <button type="button" class="btn btn-secondary" id="cancelar" disabled>Cancelar</button>
                        </div>
                    <!--</form>-->
                </div>

            </div>
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
            console.log("Botón de búsqueda clickeado");
            var NomNit = $('#NIT').val();
            //var Registro = new FormData();
            
            $.ajax({
                type: "GET",
                url: "<?php echo site_url('VentaController/buscarCliente');?>",
                dataType: "json",
                data: {
                    opcion: NomNit
                }, 
                success: function(response) {
                    
                    $("#NombreCliente").val(response.respuesta[0].nombre);
                    $("#NitCliente").val(response.respuesta[0].nit);
                    $("#idcliente").val(response.respuesta[0].id_cliente);
                    
                    $("#Factura").val(generarCadenaAleatoria);
                    var usu = response.sesion;
                    $("#Usuario").val(usu);
                    // Habilitar el select de producto después de buscar
                    $('#fk_producto').prop('disabled', false);
                },
                error: function(xhr) {
                    console.log("Error en la petición");
                }
            });
        });


        // Detectar cambios en el select de producto
        $('#fk_producto').on('change', function () {
            var selectedValue = $(this).val();

            // Verificar si el valor seleccionado es diferente de 0
            if (selectedValue !== '0') {
                // Habilitar el botón "Agregar"
                $('#btn-agregar').prop('disabled', false);
                $('#V_unidades').prop('disabled', false);
                


                // Habilitar el label de "Unidades"
            } else {
                // Deshabilitar el botón "Agregar"
                $('#btn-agregar').prop('disabled', true);
                $('#V_unidades').prop('disabled', true);

            }
        });

        // Detectar el clic en el botón "Agregar"
        $('#btn-agregar').on('click', function () {
            $('#btn-genVenta').prop('disabled', false);
        });




        $("#btn-agregar").click(function(){
            // Obtener el valor de unidades
            var unidades = $("#V_unidades").val();

            // Verificar si el campo unidades está vacío o no es un número válido
            if (unidades === "" || isNaN(parseFloat(unidades)) || parseFloat(unidades) <= 0) {
                alert("Por favor, intente de nuevo, dato no valido");
                return; // Detener la ejecución si no es válido
            }


            var producto = $("#fk_producto option:selected").text();
            var id_producto = $("#fk_producto").val();
            var precio = $("#costo").val();
            var precioTotalProducto = parseFloat(precio) * parseFloat(unidades);

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

            $("#fk_producto").val(0);
            $("#unidades").val("");
            $("#costo").val("");
            $("#V_unidades").val("");
            $("#V_unidades").prop("disabled", true);
            $("#cancelar").prop("disabled",false);
        });


function eliminar() {

    var row = $("#btnEliminar").closest("tr");
    var precio = parseFloat(row.find("td:eq(3)").text());
    
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
       
        console.log($('#V_unidades').val());
       if (parseInt(existencias)  < parseInt(solicitadas) ){
            $('#V_unidades').val("");
            $('#V_unidades').css({
               "border-color": "red"
           });
           $('#V_unidades').attr("placeholder", "Uniades no disponibles");
        }
   });

   $('#V_unidades').on('input', function () {
    var inputValue = $(this).val();

    // Comprobar si el valor ingresado es un número válido y mayor a cero
    if (isNaN(inputValue) || parseFloat(inputValue) <= 0) {
        // Si no es válido, establecer el valor del campo en vacío
        $(this).val("");
    }
});


    $("#btn-genVenta").off('click').on('click',function(){
        facturar();
        detalleFac();

        $("#NombreCliente").val("");
        $("#NitCliente").val("");
        $("#Factura").val("");
        $("#Usuario").val("");
        $("#tabla").empty();
        $("#total").val("");
        $("#NIT").val("");
    });

    function facturar(){
        var dato = $("#idcliente").val();
        var noFac = $("#Factura").val();
        var usuario = $("#Usuario").val();
        
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('VentaController/insertarEncabezado');?>",
            dataType: "json",
            data:{
                opcion: dato,
                idFac: noFac,
                usua: usuario
            },
            success: function(json){
                
            },
            error: function (error){
                alert("Se agrego factura No. " + noFac);
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
                    
                }
            });
        }
    }

    $("#cancelar").click(function(){
        $("#NombreCliente").val("");
        $("#NitCliente").val("");
        $("#Factura").val("");
        $("#Usuario").val("");
        $("#tabla tbody tr").remove();
        $("#total").val("");
        $("#NIT").val("");
        $("#fk_producto").prop("disabled", true);
        $("#btn-agregar").prop("disabled", true);
        $("#btn-genVenta").prop("disabled", true);
        $("#cancelar").prop("disabled", true);
    });

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" 
crossorigin="anonymous"></script>

<?php
$this->load->view('templates/footer');
?>
