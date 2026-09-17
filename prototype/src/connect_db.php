<?php

class ConnectDb {
    private $host = "localhost";
    private $name = "test_data";
    private $user = "root";
    private $password = "13737115"; 
    private $conn;

    public function __construct($host = null, $name = null, $user = null, $password = null) {
        if ($host) $this->host = $host;
        if ($name) $this->name = $name;
        if ($user) $this->user = $user;
        if ($password !== null) $this->password = $password;
    }

    public function connect() {
        $this->conn = null;
        
        try {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->name . ";charset=utf8mb4";
            
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ];

            $this->conn = new PDO($dsn, $this->user, $this->password, $options);
            echo "Database connected successfully!";
            
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        
        return $this->conn;
    }
}

// تنفيذ الاتصال
$database = new ConnectDb();
$db = $database->connect();

?>