<?php
class Database {
    private $host = 'localhost:4306'; // Hoặc địa chỉ của bạn
    private $db_name = 'todo_db';
    private $username = 'root'; // Tên đăng nhập
    private $password = '';
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }
        } catch (Exception $e) {
            echo "Database connection error: " . $e->getMessage();
        }

        return $this->conn;
    }
}
?>
