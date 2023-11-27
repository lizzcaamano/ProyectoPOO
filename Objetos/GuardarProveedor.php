<?php


require_once("../Clases/Proveedores.php");

$objProveedor = new Proveedores($_POST["nombre"],$_POST["direccion"],$_POST["telefono"], $_POST["correo"]);

$objProveedor->guardarProveedor();

echo $objProveedor->getNombre();
echo $objProveedor->getDireccion();
echo $objProveedor->getTelefono();
echo $objProveedor->getCorreo();
?>