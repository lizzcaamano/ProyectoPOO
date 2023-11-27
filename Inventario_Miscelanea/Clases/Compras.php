<?php

require_once ("conexion.php");
class Compras {
    private $ID_DetalleCompra;
    private $CantidadCompra;
    private $Precio_Compra;
    private $Precio_Venta;
    private $ID_ProductoFK;
    private $ID_ProveedorFK;
    const TABLA = 'DetalleCompras';

    // Getters y Setters
    public function getId() {
        return $this->ID_DetalleCompra;
    }

    public function setId($ID_DetalleCompra) {
        $this->ID_DetalleCompra= $ID_DetalleCompra;
    }

    public function getCantidadCompra() {
        return $this->CantidadCompra;
    }

    public function setCantidadCompra($CantidadCompra) {
        $this->CantidadCompra = $CantidadCompra;
    }

    public function getPrecio_Compra() {
        return $this->Precio_Compra;
    }

    public function setDireccion($Precio_Venta) {
        $this->Precio_Venta = $Precio_Venta;
    }

    public function getID_ProductoFK() {
        return $this->ID_ProductoFK;
    }

    public function setID_ProductoFK($ID_ProductoFK) {
        $this->ID_ProductoFK = $ID_ProductoFK;
    }

    public function getID_ProveedorFK() {
        return $this->ID_ProveedorFK;
    }

    public function SetID_ProveedorFK($ID_ProveedorFK) {
        $this->ID_ProveedorFK = $ID_ProveedorFK;
    }

    public function getPrecio_Venta() {
        return $this->Precio_Venta;
    }

    public function SetPrecio_Venta($Precio_Venta) {
        $this->Precio_Venta = $Precio_Venta;
    }



    // Constructor
    public function __construct($CantidadCompra, $Precio_Compra, $Precio_Venta, $ID_ProductoFK, $ID_ProveedorFK , $ID_DetalleCompra=null) {
        $this->ID_DetalleCompra = $ID_DetalleCompra;
        $this->CantidadCompra = $CantidadCompra;
        $this->Precio_Compra = $Precio_Compra;
        $this->Precio_Venta = $Precio_Venta;
        $this->ID_ProductoFK = $ID_ProductoFK;
        $this->ID_ProveedorFK=$ID_ProveedorFK;
    }

    public function guardarCompra(){
        {
            $conexion = new Conexion();
            $consulta = $conexion->prepare('INSERT INTO ' .self::TABLA .'(CantidadCompra, Precio_Compra, Precio_Venta, ID_ProductoFK, ID_ProveedorFK , ID_DetalleCompra)
            VALUES (:CantidadCompra, :Precio_Compra, :Precio_Venta, :ID_ProductoFK, :ID_ProveedorFK , :ID_DetalleCompra)');
            $consulta -> bindParam(':CantidadCompra', $this->CantidadCompra);
            $consulta -> bindParam(':Precio_Compra', $this->Precio_Compra);
            $consulta -> bindParam(':Precio_Venta', $this->Precio_Venta);
            $consulta -> bindParam(':ID_ProductoFK', $this->ID_ProductoFK);
            $consulta -> bindParam(':ID_ProveedorFK', $this->ID_ProveedorFK);
            $consulta -> bindParam(':ID_DetalleCompra', $this->ID_DetalleCompra);
            $consulta->execute();
            $this->ID_DetalleCompra = $conexion->lastInsertId();
        }
        $conexion = null;
    }

    public static function mostrarCompras(){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT ID_DetalleCompra, CantidadCompra, Precio_Compra, Precio_Venta, ID_ProductoFK, ID_ProveedorFK  FROM ' . self::TABLA . ' ORDER BY CantidadCompra');
        $consulta -> execute();
        $registros = $consulta->fetchAll();
        return $registros;

}
}

?>