<?php
class Database
{
    private static $instance = null;
    private $connection;


    private function __construct()
    { 
        try {
            
            $config = require __DIR__ . '/database.php';
            $this->connection = new PDO("mysql:host={$config['host']};dbname={$config['dbname']}", $config['user'], $config['password']);

            $this->connection->setAttribute(
            PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION
            );

        } catch (PDOException $e) {
            echo "Erreur connection " .$e->getMessage();
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) {

            self::$instance = new Database();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
