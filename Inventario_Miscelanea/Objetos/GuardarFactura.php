<?php
require_once('../Clases/Facturas.php');



$objFactura = new Facturas($_POST["Fecha"], $_POST["Cantidad"], $_POST["Total"],  $_POST["ID_ProductoFK"], $_POST["ID_ClienteFK"]);
var_dump($objFactura);
$objFactura->guardarFactura();
    echo $objFactura->getFecha();
    echo $objFactura->getCantidad();
    echo $objFactura->getTotal();
    echo $objFactura->getProductoFK();
    echo $objFactura->getClienteFK();


