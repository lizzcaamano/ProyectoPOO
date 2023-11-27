<?php

require_once ("conexion.php");
class Categorias {
    private $id_categoria;
    private $NombreCategoria;
    private $DescripcionCat;

    const TABLA = 'Categorias';

    // Getters y Setters
    public function getId() {
        return $this->id_categoria;
    }

    public function setId($id_categoria) {
        $this->id_categoria= $id_categoria;
    }

    public function getNombre() {
        return $this->NombreCategoria;
    }

    public function setNombre($NombreCategoria) {
        $this->NombreCategoria = $NombreCategoria;
    }

    public function getDescripcion() {
        return $this->DescripcionCat;
    }

    public function setDescripcion($DescripcionCat) {
        $this->DescripcionCat = $DescripcionCat;
    }


    // Constructor
    public function __construct($NombreCategoria, $DescripcionCat, $id_categoria=null) {
        $this->id_categoria = $id_categoria;
        $this->NombreCategoria = $NombreCategoria;
        $this->DescripcionCat = $DescripcionCat;
    }

    public function guardarCategoria(){
        {
            $conexion = new Conexion();
            $consulta = $conexion->prepare('INSERT INTO ' .self::TABLA .'(NombreCategoria, DescripcionCat)
            VALUES (:NombreCategoria, :DescripcionCat)');
            $consulta -> bindParam(':NombreCategoria', $this->NombreCategoria);
            $consulta -> bindParam(':DescripcionCat', $this->DescripcionCat);
            $consulta->execute();
            $this->id_categoria = $conexion->lastInsertId();
        }
        $conexion = null;
    }

    public static function mostrarCategoria(){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT NombreCategoria, DescripcionCat  FROM ' . self::TABLA . ' ORDER BY NombreCategoria');
        $consulta -> execute();
        $registros = $consulta->fetchAll();
        return $registros;

}
}

?>