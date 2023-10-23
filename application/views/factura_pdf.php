<!DOCTYPE html>
<html>
<head>
    <title>Detalle de Factura</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1, h3, h5 {
            text-align: center;
            margin-top: 0px; /* Reduzcamos el margen superior */
            margin-bottom: 0px; /* Reduzcamos el margen inferior */
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .centered-content {
            text-align: center; /* Centra el contenido horizontalmente */
            padding: 20px; /* Añade espaciado alrededor del contenido */
        }

        .centered-content img {
            display: block; /* Evita espacio adicional debajo de la imagen */
            margin: 0 auto; /* Centra la imagen horizontalmente */
        }
    </style>
</head>
<body>

<?php
// Establece la ruta relativa desde el directorio base de tu proyecto a la carpeta 'assets' donde se encuentra la imagen.
$imgpath = base_url('assets/logotipo.jpg');
$ext = pathinfo($imgpath, PATHINFO_EXTENSION);
$data = file_get_contents($imgpath);
$base64 = 'data:image/' . $ext . ';base64,' . base64_encode($data);
?>
    <div>
        <div class="centered-content">
        <img src="<?php echo $base64; ?>" alt="Logo">

            <h3>Sueños de Tinta S.A.</h3>
            <h5>Nit: 8753429-5</h5>
            <h5>4ta Avenida 15-10, Zona 1, Ciudad de Guatemala, Guatemala</h5>
        </div>
        <table>
            <tr>
                <th>No. de Factura</th>
                <th>Nombre del Cliente</th>
                <th>Fecha</th>
            </tr>
            <tr>
                <td><?php echo $detalles[0]->id_factura; ?></td>
                <td><?php echo $detalles[0]->nombre_cliente; ?></td>
                <td><?php echo $detalles[0]->fecha; ?></td>
            </tr>
        </table>
    </div>
    <div>   
    <h2>Detalles de la Factura</h2>
    <table style="height:90%;">
            <thead>
                <tr>
                    <th class="quantity-cell">Cantidad</th>
                    <th class="product-cell">Producto</th>
                    <th class="price-cell center_align">Precio Unitario</th>
                    <th class="price-cell center_align">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;

                foreach ($detalles as $detalle):
                    $subtotal = $detalle->unidades * $detalle->precio;
                    $total += $subtotal;
                    ?>
                    <tr>
                        <td class="quantity-cell">
                            <?php echo $detalle->unidades; ?>
                        </td>
                        <td class="product-cell">
                            <?php echo $detalle->nombre_producto; ?>
                        </td>
                        <td class="price-cell right-align">
                            <?php echo 'Q. ' . number_format($detalle->precio, 2, '.', ','); ?>
                        </td>
                        <td class="price-cell right-align">
                            <?php echo 'Q. ' . number_format($subtotal, 2, '.', ','); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tr>
            <?php
                function numeroALetras($numero) {
                    $parteEntera = floor($numero);
                            $parteDecimal = $numero - $parteEntera;

                    $formatter = new NumberFormatter('es', NumberFormatter::SPELLOUT);
                    $parteEnteraEnPalabras = $formatter->format($parteEntera);
                        
                    $parteDecimalFraccion = number_format($parteDecimal, 2, '.', '');
                    list($entero, $decimal) = explode('.', $parteDecimalFraccion);
                        
                    $fraccionEnPalabras = '';
                    if ($decimal > 0) {
                        $fraccionEnPalabras = "con $decimal/100";
                    }
                    
                    $numeroEnPalabras = "$parteEnteraEnPalabras $fraccionEnPalabras";
                        
                    return $numeroEnPalabras;
                }                        
                        
            ?>
        <td colspan="3" class="total right-align">
            <?php
                echo '(' . numeroALetras($total) . ' quetzales)';
            ?>
        </td>       
        <td class="total right-align">
            <?php
                echo 'TOTAL Q. ' . number_format($total, 2, '.', ',');
            ?> 
        </td>
            </tr>
        </table>
     
    </div>

</body>
</html>
