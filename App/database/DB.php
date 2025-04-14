<?php
namespace App\Database;
class DB {
    private static $instance = null;
    private $connection;
    private $host = 'localhost';
    private $dbName = 'your_database';
    private $username = 'username';
    private $password = 'password';

    private function __construct()
    {
        $this->connect();
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new DB();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function connect()
    {
        try {
            $this->connection = new \PDO("mysql:host={$this->host};dbname={$this->dbName}", $this->username, $this->password);
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}