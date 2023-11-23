<?php

require_once ("conexion.php");
class Productos {
    private $ID_Producto;
    private $NombreProd;
    private $CodigoProducto;
    private $DescripcionProd;
    private $PrecioUnitario;
    private $PrecioCompra;
    private $Cantidad_Disponible;
    private $ID_CategoriaFK;
    
    const TABLA = 'productos';

    // Constructor
    public function __construct($NombreProd,$CodigoProducto,$DescripcionProd,$PrecioUnitario,$PrecioCompra,$Cantidad_Disponible,$ID_CategoriaFK,$ID_Producto=null) {
        $this->ID_Producto = $ID_Producto;
        $this->NombreProd = $NombreProd;
        $this->CodigoProducto = $CodigoProducto;
        $this->DescripcionProd = $DescripcionProd;
        $this->PrecioUnitario = $PrecioUnitario;
        $this->PrecioCompra = $PrecioCompra;
        $this->Cantidad_Disponible = $Cantidad_Disponible;
        $this->ID_CategoriaFK = $ID_CategoriaFK;
    }



    // Getters y Setters

    public function getID_Producto() {
        return $this->ID_Producto;
    }

    public function setID_Producto($ID_Producto) {
        $this->ID_Producto = $ID_Producto;
    }

    public function getNombreProd() {
        return $this->NombreProd;
    }

    public function setNombreProd($NombreProd) {
        $this->NombreProd = $NombreProd;
    }

    
    public function getCodigoProducto() {
        return $this->CodigoProducto;
    }

    public function setCodigoproducto($CodigoProducto) {
        $this->CodigoProducto = $CodigoProducto;
    }

    public function getDescripcion() {
        return $this->DescripcionProd;
    }

    public function setDescripcion($DescripcionProd) {
        $this->DescripcionProd = $DescripcionProd;
    }

    public function getPrecioUnitario() {
        return $this->PrecioUnitario;
    }

    public function setPrecioUnitario($PrecioUnitario) {
        $this->PrecioUnitario = $PrecioUnitario;
    }

    public function getPrecioCompra() {
        return $this->PrecioCompra;
    }

    public function setPrecioCompra($PrecioCompra) {
        $this->PrecioCompra = $PrecioCompra;
    }

    public function getCantidad_Disponible() {
        return $this->Cantidad_Disponible;
    }

    public function setCantidad_Disponible($Cantidad_Disponible) {
        $this->Cantidad_Disponible = $Cantidad_Disponible;
    }

    public function getID_CategoriaFK() {
        return $this->ID_CategoriaFK;
    }

    public function setID_CategoriaFK($ID_CategoriaFK) {
        $this->ID_CategoriaFK = $ID_CategoriaFK;
    }



    public function guardarProducto(){
        
            $conexion = new Conexion();
            $consulta = $conexion->prepare('INSERT INTO ' .self::TABLA . ' (NombreProd, CodigoProducto, DescripcionProd, PrecioUnitario, PrecioCompra, Cantidad_Disponible, ID_CategoriaFK)
            VALUES (:NombreProd, :CodigoProducto, :DescripcionProd, :PrecioUnitario, :PrecioCompra, :Cantidad_Disponible, :ID_CategoriaFK)');

            try {
            $consulta -> bindParam(':NombreProd', $this->NombreProd);
            $consulta -> bindParam(':CodigoProducto', $this->CodigoProducto);
            $consulta -> bindParam(':DescripcionProd', $this->DescripcionProd);
            $consulta -> bindParam(':PrecioUnitario', $this->PrecioUnitario);
            $consulta -> bindParam(':PrecioCompra', $this->PrecioCompra);
            $consulta -> bindParam(':Cantidad_Disponible', $this->Cantidad_Disponible);
            $consulta -> bindParam(':ID_CategoriaFK', $this->ID_CategoriaFK);
            $consulta -> execute(); 
            $this->ID_Producto = $conexion->lastInsertId();
            

             echo "Producto guardado con éxito";
            } catch (PDOException $e) {
                echo "Ha surgio un error y no se pudo guardar el producto. Detalle: ". $e->getMessage();
            }
    }

    public static function mostrarProductos(){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT ID_Producto, NombreProd, CodigoProducto, DescripcionProd, PrecioUnitario, PrecioCompra, Cantidad_Disponible, ID_CategoriaFK 
        FROM ' . self::TABLA . ' ORDER BY ID_Producto');
        $consulta -> execute();
        $registros = $consulta->fetchAll();
        return $registros;

}

}