<?php    
    require_once('../Clases/productos.php');
    require_once('../Clases/clientes.php');
    $productos=productos::mostrarProductos();
    $clientes=clientes::mostrarClientes();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    <form method="POST" action="../Objetos/GuardarFactura.php">
    <p>Fecha<input type="date" name="Fecha" id="Fecha"/></p>  
    <p>Cantidad<input type="number" name="Cantidad" id="Cantidad" /></p>    
    <p>Total<input type="number" name="Total" id="Total" /></p>

    <select class="form-select form-select mb-3" name="ID_ProductoFK">
        <option selected>Seleccione</option>
            <?php
            foreach ($productos as $producto) {
                echo "<option value='" . $producto['ID_Producto'] . "'>" . $producto['NombreProd'] . "</option>";
            }
            ?>
        </select>
        <h1 class="h3 mb-4 text-gray-800">Cliente</h1>
        <select class="form-select form-select mb-3" name="ID_ClienteFK">
        <option selected>Seleccione</option>
            <?php
            foreach ($clientes as $cliente) {
                echo "<option value='" . $cliente['ID_Cliente'] . "'>" . $cliente['NombreCli'] . "</option>";
            }
            ?>
        </select>
    <p><input type="submit" value="Enviar"></p>
    </form>
</body>
</html>