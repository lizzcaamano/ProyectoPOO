<?php

require_once ("conexion.php");
class Cuentas {
    private $id_cuenta;
    private $Monto_Debido;
    private $Fecha_Limite;
    private $ID_ClienteFK;
    const TABLA = 'CuentasPorCobrar';

    // Getters y Setters
    public function getId() {
        return $this->id_cuenta;
    }

    public function setId($id_cuenta) {
        $this->id_cuenta= $id_cuenta;
    }

    public function getMonto() {
        return $this->Monto_Debido;
    }

    public function setMonto($Monto_Debido) {
        $this->Monto_Debido = $Monto_Debido;
    }

    public function getFechaLimite() {
        return $this->Fecha_Limite;
    }

    public function setFechaLimite($Fecha_Limite) {
        $this->Fecha_Limite = $Fecha_Limite;
    }

    public function getCliente() {
        return $this->ID_ClienteFK;
    }

    public function setCliente($ID_ClienteFK) {
        $this->ID_ClienteFK = $ID_ClienteFK;
    }

    // Constructor
    public function __construct($Monto_Debido, $Fecha_Limite, $ID_ClienteFK, $id_cuenta=null) {
        $this->id_cuenta = $id_cuenta;
        $this->Monto_Debido = $Monto_Debido;
        $this->Fecha_Limite = $Fecha_Limite;
        $this->ID_ClienteFK = $ID_ClienteFK;
    }

    public function guardarCuenta(){
        {
            $conexion = new Conexion();
            $consulta = $conexion->prepare('INSERT INTO ' .self::TABLA .'(Monto_Debido, Fecha_Limite, ID_ClienteFK)
            VALUES (:Monto_Debido, :Fecha_Limite, :ID_ClienteFK)');
            $consulta -> bindParam(':Monto_Debido', $this->Monto_Debido);
            $consulta -> bindParam(':Fecha_Limite', $this->Fecha_Limite);
            $consulta -> bindParam(':ID_ClienteFK', $this->ID_ClienteFK);
            $consulta->execute();
            $this->id_cuenta = $conexion->lastInsertId();
        }
        $conexion = null;
    }

    public static function mostrarCuentas(){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT Monto_Debido, Fecha_Limite, ID_ClienteFK  FROM ' . self::TABLA . ' ORDER BY Fecha_Limite');
        $consulta -> execute();
        $registros = $consulta->fetchAll();
        return $registros;

}
}

?>