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
        $this->host = getenv('DB_HOST') ?? $_ENV['DB_HOST'] ?? 'localhost';
        $this->dbName = getenv('DB_NAME') ?? $_ENV['DB_NAME'] ?? 'my_database';
        $this->username = getenv('DB_USERNAME') ?? $_ENV['DB_USERNAME'] ?? 'root';
        $this->password = getenv('DB_PASSWORD') ?? $_ENV['DB_PASSWORD'] ?? '';
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