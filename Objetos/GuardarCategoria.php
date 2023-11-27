<?php
require_once("../Clases/Categorias.php");

$objCategorias = new Categorias($_POST["nombre"], $_POST["descripcion"]);

$objCategorias->guardarCategoria();

echo $objCategorias->getNombre();
echo $objCategorias->getDescripcion();
?>