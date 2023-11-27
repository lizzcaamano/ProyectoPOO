<?php

require_once ("conexion.php");
class Historicos {
    private $ID_Historico;
    private $Fecha;
    private $Detalles;
    private $ID_ProductoFK;
    private $ID_UsuarioFK;

    const TABLA = 'HistoricoModificacion';

            // Constructor
    public function __construct($Fecha, $Detalles,$ID_ProductoFK,$ID_UsuarioFK, $ID_Historico=null) {
        $this->Fecha = $Fecha;
        $this->Detalles = $Detalles;
        $this->ID_ProductoFK = $ID_ProductoFK;
        $this->ID_UsuarioFK = $ID_UsuarioFK;
        $this->ID_Historico = $ID_Historico;
    }

    // Getters
    public function getFecha() {
        return $this->Fecha;
    }

    public function getDetalles() {
        return $this->Detalles;
    }

    public function getID_ProductoFK() {
        return $this->ID_ProductoFK;
    }

    public function getID_UsuarioFK() {
        return $this->ID_UsuarioFK;
    }

    public function getID_Historico() {
        return $this->ID_Historico;
    }

    // Setters
    public function setFecha($Fecha) {
        $this->Fecha = $Fecha;
    }

    public function setDetalles($Detalles) {
        $this->Detalles = $Detalles;
    }

    public function setID_ProductoFK($ID_ProductoFK) {
        $this->ID_ProductoFK = $ID_ProductoFK;
    }

    public function setID_UsuarioFK($ID_UsuarioFK) {
        $this->ID_UsuarioFK = $ID_UsuarioFK;
    }

    public function setID_Historico($ID_Historico) {
        $this->ID_Historico = $ID_Historico;
    }

    public function guardarHistorico(){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('INSERT INTO historicomodificacion (Fecha, Detalles, ID_ProductoFK, ID_UsuarioFK)VALUES (:Fecha, :Detalles, :ID_ProductoFK, :ID_UsuarioFK)');
        try{
           $consulta -> bindParam(':Fecha', $this->Fecha);
           $consulta -> bindParam(':Detalles', $this->Detalles);
           $consulta -> bindParam(':ID_ProductoFK', $this->ID_ProductoFK);
           $consulta -> bindParam(':ID_UsuarioFK', $this->ID_UsuarioFK);
           $consulta->execute();
           $this->ID_Historico = $conexion->lastInsertId();
           echo "categoria guardado con éxito";
       } catch (PDOException $e) {
           echo "Ha surgio un error y no se pudo guardar el proveedor. Detalle: ". $e->getMessage();
       }
        }

    
     public static function mostrarHistoricos(){
            $conexion = new Conexion();
            $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' ORDER BY ID_Historico');
            $consulta -> execute();
            $registros = $consulta->fetchAll();
            return $registros;

    }
    
}