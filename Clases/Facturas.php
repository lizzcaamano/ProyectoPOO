<?php

require_once ("conexion.php");
class Facturas {
    private $ID_Factura;
    private $Fecha;
    private $Cantidad;
    private $Total;
    private $ID_ProductoFK;
    private $ID_ClienteFK;

    const TABLA = 'Facturas';

    // Getters y Setters
    public function getId() {
        return $this->ID_Factura;
    }

    public function setId($ID_Factura) {
        $this->ID_Factura= $ID_Factura;
    }

    public function getFecha() {
        return $this->Fecha;
    }

    public function setFecha($Fecha) {
        $this->Fecha = $Fecha;
    }

    public function getCantidad() {
        return $this->Cantidad;
    }

    public function setCantidad($Cantidad) {
        $this->Cantidad = $Cantidad;
    }

    public function getTotal() {
        return $this->Total;
    }

    public function setTotal($Total) {
        $this->Total = $Total;
    }

    public function getProductoFK() {
        return $this->ID_ProductoFK;
    }

    public function setProductoFK($ID_ProductoFK) {
        $this->ID_ProductoFK = $ID_ProductoFK;
    }

    
    public function getClienteFK() {
        return $this->ID_ClienteFK;
    }

    public function setClienteFK($ID_ClienteFK) {
        $this->ID_ClienteFK = $ID_ClienteFK;
    }



    // Constructor
    public function __construct($Fecha, $Cantidad, $Total, $ID_ProductoFK, $ID_ClienteFK, $ID_Factura=null) {
        $this->ID_Factura = $ID_Factura;
        $this->Fecha = $Fecha;
        $this->Cantidad = $Cantidad;
        $this->Total = $Total;
        $this->ID_ProductoFK = $ID_ProductoFK;
        $this->ID_ClienteFK = $ID_ClienteFK;
    }

    public function guardarFactura(){
        {
            $conexion = new Conexion();
            $consulta = $conexion->prepare('INSERT INTO ' .self::TABLA .'(Fecha, Cantidad, Total, ID_ProductoFK, ID_ClienteFK)
            VALUES (:Fecha, :Cantidad, :Total, :ID_ProductoFK, :ID_ClienteFK)');
            $consulta -> bindParam(':Fecha', $this->Fecha);
            $consulta -> bindParam(':Cantidad', $this->Cantidad);
            $consulta -> bindParam(':Total', $this->Total);
            $consulta -> bindParam(':ID_ProductoFK', $this->ID_ProductoFK);
            $consulta -> bindParam(':ID_ClienteFK', $this->ID_ClienteFK);
            $consulta->execute();
            $this->ID_Factura = $conexion->lastInsertId();
        }
        $conexion = null;
    }

    public static function mostrarFacturas(){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT Fecha, Cantidad, Total, ID_ProductoFK, ID_ClienteFK  FROM ' . self::TABLA . ' ORDER BY Fecha');
        $consulta -> execute();
        $registros = $consulta->fetchAll();
        return $registros;

}
}

?>