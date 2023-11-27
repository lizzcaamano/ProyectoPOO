<?php


require_once("../clases/Historico.php");
//$objPersonaje = personaje::guardar();
//Crear un objeto (instancia de una clase)

//var_dump($_POST);

$objhistorico = new Historicos($_POST["Fecha"], $_POST["Detalles"], $_POST["ID_ProductoFK"], $_POST["ID_UsuarioFK"]);

$objhistorico->guardarHistorico();
var_dump($_POST);

echo $objhistorico->getFecha();
echo $objhistorico->getDetalles();
echo $objhistorico->getID_ProductoFK();
echo $objhistorico->getID_UsuarioFK();
?>