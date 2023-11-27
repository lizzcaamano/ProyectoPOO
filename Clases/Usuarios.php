<?php

require_once ("conexion.php");
class Usuarios {
    private $ID_Usuario;
    private $NombreUsuario;
    private $Contrasena;
    private $ID_RolFK;

    //private $estado;
    const TABLA = 'usuarios';

    // Constructor
    public function __construct($NombreUsuario, $Contrasena, $ID_RolFK, $ID_Usuario=null) {
        $this->ID_Usuario = $ID_Usuario;
        $this->NombreUsuario = $NombreUsuario;
        $this->Contrasena = $Contrasena;
        $this->ID_RolFK = $ID_RolFK;
        //$this->estado = $estado;
    }

    // Getters y Setters

    
    public function getID_Usuario() {
        return $this->ID_Usuario;
    }

    public function setIdCliente($ID_Usuario) {
        $this->ID_Usuario = $ID_Usuario;
    }

    public function getNombreUsuario() {
        return $this->NombreUsuario;
    }

    public function setNombreUsuario($NombreUsuario) {
        $this->NombreUsuario = $NombreUsuario;
    }

    public function getContrasena() {
        return $this->Contrasena;
    }

    public function setContrasena($Contrasena) {
        $this->Contrasena = $Contrasena;
    }


    public function getID_RolFK() {
        return $this->ID_RolFK;
    }

    public function setID_RolFK($ID_RolFK) {
        $this->ID_RolFK = $ID_RolFK;
    }

    //public function getEstado() {
       /// return $this->estado;
    //}

    //public function setEstado($estado) {
        //$this->estado = $estado;
    //}

    public function guardarUsuario(){
        
        $conexion = new Conexion();
        $consulta = $conexion->prepare('INSERT INTO usuarios ( NombreUsuario, Contrasena, ID_RolFK) VALUES ( :NombreUsuario, :Contrasena, :ID_RolFK)');

        // Relacionar los parámetros de la consulta con las variables correspondientes
        try {
        $consulta -> bindParam(':NombreUsuario', $this->NombreUsuario);
        $consulta -> bindParam(':Contrasena', $this->Contrasena);
        $consulta -> bindParam(':ID_RolFK', $this->ID_RolFK);
        $consulta -> execute();
        $this->ID_Usuario = $conexion->lastInsertId();
        echo "Usuario guardado con éxito";
    } catch (PDOException $e) {
        echo "Ha surgio un error y no se pudo guardar el usuario. Detalle: ". $e->getMessage();
    }
    
    }
    
    public static function mostrarUsuarios(){
            $conexion = new Conexion();
            $consulta = $conexion->prepare('SELECT *  FROM ' . self::TABLA . ' ORDER BY NombreUsuario');
            $consulta -> execute();
            $registros = $consulta->fetchAll();
            return $registros;

    }
}