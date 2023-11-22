<?php

require_once("../database/MysqlConnection.php");

class Usuarios
{
    private $db;

    public function __construct()
    {
        $this->db = MysqlConnection::getInstance()->GetDatabase();
    }

    public function agregarUsuario($nombre, $email, $password, $identification)
    {
        $queryAgregarUsuario = "INSERT INTO users (identification, email, password) VALUES (:identification , :email, :password)";
        $statementAgregarUsuario = $this->db->prepare($queryAgregarUsuario);
        $statementAgregarUsuario->bindParam(':identification', $identification); 
        $statementAgregarUsuario->bindParam(':email', $email);
        $statementAgregarUsuario->bindParam(':password', $password);
        $statementAgregarUsuario->execute();
        $id_usuario = $this->db->lastInsertId();
        return $id_usuario;
    }

    public function obtenerUsuarioPorEmail($email)
    {
        $query = "SELECT * FROM users WHERE email = :email";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':email', $email);
        $statement->execute();
        $usuario = $statement->fetch(PDO::FETCH_ASSOC);

        return $usuario;
    }
}
?>
