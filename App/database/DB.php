<?php
namespace App\Database;
class DB {
    private static $instance = null;
    private \PDO $connection;
    private $host;
    private $dbName;
    private $username;
    private $password;

    private function __construct()
    {
        $this->host = config('DB_HOST', 'localhost');
        $this->dbName = config('DB_NAME', 'app_test');
        $this->username = config('DB_USERNAME', 'root');
        $this->password = config('DB_PASSWORD', '1');
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

    public function query($sql, $params = [])
    {
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
}