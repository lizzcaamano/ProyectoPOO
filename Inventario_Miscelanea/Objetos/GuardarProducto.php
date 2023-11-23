<?php

require_once("../Clases/Productos.php");

$objProducto = new Producto($_POST["NombreProd"], $_POST["CodigoProducto"], $_POST["DescripcionProd"], $_POST["PrecioUnitario"], $_POST["PrecioCompra"], $_POST["Cantidad_Disponible"], $_POST["ID_CategoriaFK"]);

$objProducto->guardarProducto();

echo $objProducto->getNombreProd();
echo $objProducto->getCodigoProducto();
echo $objProducto->getDescripcion();    
echo $objProducto->getPrecioUnitario();
echo $objProducto->getPrecioCompra();
echo $objProducto->getCantidad_Disponible();
echo $objProducto->getID_CategoriaFK();
?>