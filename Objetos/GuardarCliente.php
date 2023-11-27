<?php
require_once("../Clases/Clientes.php");

$objClientes = new Clientes($_POST["nombre"], $_POST["direccion"], $_POST["telefono"]);

$objClientes->guardarCliente();

echo $objClientes->getNombre();
echo $objClientes->getDireccion();
echo $objClientes->getTelefono();
?>