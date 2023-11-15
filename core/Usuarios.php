<?php

require_once("../database/MysqlConnection.php");

class Usuarios
{
    private $db;

    public function __construct()
    {
        $this->db = MysqlConnection::getInstance()->GetDatabase();
    }

    public function agregarUsuario($nombre, $email, $password, $cedula)
    {
        $queryAgregarUsuario = "INSERT INTO usuarios (nombre, email, password, cedula) VALUES (:nombre, :email, :password, :cedula)";
        $statementAgregarUsuario = $this->db->prepare($queryAgregarUsuario);
        $statementAgregarUsuario->bindParam(':nombre', $nombre);
        $statementAgregarUsuario->bindParam(':email', $email);
        $statementAgregarUsuario->bindParam(':password', $password);
        $statementAgregarUsuario->bindParam(':cedula', $cedula); 
        $statementAgregarUsuario->execute();
        
        $id_usuario = $this->db->lastInsertId();
        
        $queryAgregarCuenta = "INSERT INTO cuentas_bancarias (id_usuario, saldo) VALUES (:id_usuario, :saldo)";
        $statementAgregarCuenta = $this->db->prepare($queryAgregarCuenta);
        $saldoInicial = 5000; 
        $statementAgregarCuenta->bindParam(':id_usuario', $id_usuario);
        $statementAgregarCuenta->bindParam(':saldo', $saldoInicial);
        $statementAgregarCuenta->execute();
    }

    public function obtenerUsuarioPorEmail($email)
    {
        $query = "SELECT * FROM usuarios WHERE email = :email";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':email', $email);
        $statement->execute();
        $usuario = $statement->fetch(PDO::FETCH_ASSOC);

        return $usuario;
    }
}
?>
