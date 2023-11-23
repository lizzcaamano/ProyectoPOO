<?php

require_once ("conexion.php");
class Clientes {
    private $id_cliente;
    private $nombre;
    private $direccion;
    private $telefono;
    const TABLA = 'Clientes';

    // Getters y Setters
    public function getId() {
        return $this->id_cliente;
    }

    public function setId($id_cliente) {
        $this->id_cliente= $id_cliente;
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


    // Constructor
    public function __construct($nombre, $direccion, $telefono, $id_cliente=null) {
        $this->id_cliente = $id_cliente;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
    }

    public function guardarCliente(){
        {
            $conexion = new Conexion();
            $consulta = $conexion->prepare('INSERT INTO ' .self::TABLA .'(NombreCli, DireccionCli, Telefono)
            VALUES (:NombreCli, :DireccionCli, :Telefono)');
            $consulta -> bindParam(':NombreCli', $this->nombre);
            $consulta -> bindParam(':DireccionCli', $this->direccion);
            $consulta -> bindParam(':Telefono', $this->telefono);
            $consulta->execute();
            $this->id_cliente = $conexion->lastInsertId();
        }
        $conexion = null;
    }

    public static function mostrarClientes(){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT NombreCli, DireccionCli, Telefono  FROM ' . self::TABLA . ' ORDER BY NombreCli');
        $consulta -> execute();
        $registros = $consulta->fetchAll();
        return $registros;

}
}

?>