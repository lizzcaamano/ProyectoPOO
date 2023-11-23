<?php
require_once("Conexion.php");

class Facturas{

    private $ID;
    private $Fecha;
    private $Cantidad;
    private $Total;
    private $ID_ProductoFK;
    private $ID_ClienteFK;

    const TABLA = 'Facturas';

    public function getID(){
        return $this->ID;
    }

    public function getFecha(){
        return $this->Fecha;
    }

    public function getCantidad(){
        return $this->Cantidad;
    }

    public function getTotal(){
        return $this->Total;
    }

    public function getProductoID(){
        return $this->ID_ProductoFK;
    }

    public function getClienteID(){
        return $this->ID_ClienteFK;
    }

    public function setID($ID){
        $this->ID = $ID;
    }

    public function setFecha($Fecha){
        $this->Fecha = $Fecha;
    }

    public function setCantidad($Cantidad){
        $this->Cantidad = $Cantidad;
    }

    public function setTotal($Total){
        $this->Total = $Total;
    }

    public function setProductoID($ID_ProductoFK){
        $this->ID_ProductoFK = $ID_ProductoFK;
    }

    public function setClienteID($ID_ClienteFK){
        $this->ID_ClienteFK = $ID_ClienteFK;
    }

     //constructor
     public function __construct($fecha,$cantidad,$total, $ID_ProductoFK, $ID_ClienteFK,$id=null){
        $this->ID = $id;
        $this->Fecha = $fecha;
        $this->Cantidad = $cantidad;
        $this->Total = $total;
        $this->ID_ProductoFK = $ID_ProductoFK;
        $this->ID_ClienteFK = $ID_ClienteFK;

    }

    public function guardarFactura(){
            {
                $conex = new Conexion();
                $consulta = $conex->prepare('INSERT INTO ' . self::TABLA . ' (Fecha, Cantidad, Total, ID_ProductoFK, ID_ClienteFK) VALUES (:fecha,:cantidad, :total, :ID_ProductoFK, :ID_ClienteFK)');
                $consulta->bindParam(':fecha', $this->Fecha);
                $consulta->bindParam(':cantidad', $this->Cantidad);
                $consulta->bindParam(':total', $this->Total);
                $consulta->bindParam(':ID_ProductoFK', $this->ID_ProductoFK);
                $consulta->bindParam(':ID_ClienteFK', $this->ID_ClienteFK);
                $consulta->execute();
                $this->ID = $conex->lastInsertId();
            }
        $conex= null;
    }


    public static function mostrarFactura(){

        $conex = new Conexion();
        $consulta = $conex->prepare('SELECT Fecha, Cantidad, Total, ID_ProductoFK, ID_ClienteFK FROM '  . self::TABLA . ' ORDER BY ID_ProductoFK');
        $consulta->execute();
        $registros = $consulta->fetchAll();
        return $registros;
    }

}