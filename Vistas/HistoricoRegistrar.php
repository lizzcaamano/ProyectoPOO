<?php    
    require_once('../Clases/productos.php');
    require_once('../Clases/Usuarios.php');
    $productos=productos::mostrarProductos();
    $Usuarios=Usuarios::mostrarUsuarios();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../style/styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    <form method="POST" action="../Objetos/guardarhistorico.php" class="form">
    <p>Fecha<input type="date" name="Fecha" id="Fecha" /></p>
    <p>Detalles<input type="text" name="Detalles" id="Detalles" /></p>  
    <select class="form-select form-select mb-3" name="ID_ProductoFK">
        <option>Seleccione</option>
            <?php
            foreach ($productos as $producto) {
                echo "<option value='" . $producto['ID_Producto'] . "'>" . $producto['NombreProd'] . "</option>";
            }
            ?>
        </select>
       <p>Cliente</p>
        <select class="form-select form-select mb-3" name="ID_UsuarioFK">
        <option>Seleccione</option>
            <?php
            foreach ($Usuarios as $usuario) {
                echo "<option value='" . $usuario['ID_Usuario'] . "'>" . $usuario['NombreUsuario'] . "</option>";
            }
            ?>
        </select>
    <p><input type="submit" value="Enviar"></p>
    </form>
</body>
</html>