<?php

namespace App\Database;

class DB
{
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
        $this->username = config('DB_USER', 'root');
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
            $options = [
                \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,      // Báo lỗi chi tiết
                \PDO::ATTR_EMULATE_PREPARES   => false,                       // Dùng prepare thật của MySQL
                \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci", // Đặt charset và collation khi kết nối
            ];
            $this->connection = new \PDO("mysql:host={$this->host};dbname={$this->dbName}", $this->username, $this->password, $options);
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
    /**
     * @param string|array $table
     * @param array $columns
     * @param string $where
     * @param array $params
     * @param int $fetch
     * @return array
     */
    public function select($table, array $columns = ['*'], $where = '', array $params = [], $fetch = \PDO::FETCH_ASSOC)
    {

        $cols = implode(', ', $columns);
        $tbl  = is_array($table) ? implode(', ', $table) : $table;
        $sql  = "SELECT {$cols} FROM {$tbl}" . ($where !== '' ? " WHERE {$where}" : '');
        return $this->query($sql, $params)->fetchAll($fetch);
    }
    public function insert($table, array $data)
    {
        $columns = implode(', ', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));
        $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$placeholders})";
        $stmt = $this->query($sql, $data);
        return $stmt->rowCount();
    }
    public function update($table, array $data, $where, array $params = [])
    {
        $set = '';
        foreach ($data as $key => $value) {
            $set .= "{$key} = :{$key}, ";
            $params[$key] = $value;
        }
        $set = rtrim($set, ', ');
        $sql = "UPDATE {$table} SET {$set} WHERE {$where}";
        return $this->query($sql, $params)->rowCount();
    }
    public function delete($table, $where, array $params = [])
    {
        $sql = "DELETE FROM {$table} WHERE {$where}";
        return $this->query($sql, $params)->rowCount();
    }
}
