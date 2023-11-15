<?php

class MysqlConnection
{
    private static MysqlConnection $instance;
    private PDO $db;

    /**
     * Constructor privado para crear una instancia de la conexión a la base de datos MySQL.
     */
    private function __construct()
    {
        // Lee la configuración de la base de datos desde un archivo o fuente adecuada.
        $config = json_decode(file_get_contents(__DIR__ . '/../config.json'));

        $host = $config->database->host;
        $username = $config->database->username;
        $password = $config->database->password;
        $database = $config->database->dbname;

        try {
            // Crea una instancia de PDO para establecer la conexión a la base de datos.
            $this->db = new PDO("mysql:host=$host;dbname=$database", $username, $password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->exec("SET CHARACTER SET utf8");
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    /**
     * Obtiene una instancia única de la conexión a la base de datos.
     *
     * @return MysqlConnection Instancia de la conexión a la base de datos MySQL.
     */
    public static function getInstance(): MysqlConnection
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Obtiene la instancia de la conexión a la base de datos.
     *
     * @return PDO Instancia de PDO para la conexión a la base de datos.
     */
    public function GetDatabase(): PDO
    {
        return $this->db;
    }
}