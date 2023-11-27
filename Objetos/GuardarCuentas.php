<?php
require_once("../Clases/CuentasPorCobrar.php");

$objCuentas = new Cuentas($_POST["Monto_Debido"], $_POST["FechaLimite"], $_POST["Cliente"]);

$objCuentas->guardarCuenta();

echo $objCuentas->getMonto();
echo $objCuentas->getFechaLimite();
echo $objCuentas->getCliente();
?>