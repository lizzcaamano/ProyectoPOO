<?php

require_once ("conexion.php");
class Proveedores {
    private $id_proveedor;
    private $nombre;
    private $direccion;
    private $telefono;
    private $correo;
    const TABLA = 'Proveedores';

    // Getters y Setters
    public function getId() {
        return $this->id_proveedor;
    }

    public function setId($id_proveedor) {
        $this->id_proveedor= $id_proveedor;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }


    // Constructor
    public function __construct($nombre, $direccion, $telefono, $correo, $id_proveedor=null) {
        $this->id_proveedor = $id_proveedor;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->correo = $correo;


    }

    public function guardarProveedor(){
        {
            $conexion = new Conexion();
            $consulta = $conexion->prepare('INSERT INTO ' .self::TABLA .'(NombreProv, DireccionProv, Telefono, Correo)
            VALUES (:NombreProv, :DireccionProv, :Telefono, :Correo)');
            $consulta -> bindParam(':NombreProv', $this->nombre);
            $consulta -> bindParam(':DireccionProv', $this->direccion);
            $consulta -> bindParam(':Telefono', $this->telefono);
            $consulta -> bindParam(':Correo', $this->correo);
            $consulta->execute();
            $this->id_proveedor = $conexion->lastInsertId();
        }
        $conexion = null;
    }

    public static function mostrarProveedor(){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT NombreProv, DireccionProv, Telefono, Correo FROM ' . self::TABLA . ' ORDER BY NombreProv');
        $consulta -> execute();
        $registros = $consulta->fetchAll();
        return $registros;

}
}

?>