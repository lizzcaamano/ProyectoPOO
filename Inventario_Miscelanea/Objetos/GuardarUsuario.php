<?php


require_once("../Clases/usuarios.php");

$objusuario = new usuarios($_POST["NombreUsuario"], $_POST["Contrasena"],$_POST["ID_RolFK"]);

$objusuario->guardarUsuario();


echo $objusuario->getNombreUsuario();
echo $objusuario->getContrasena();
echo $objusuario->getID_RolFK();
?>