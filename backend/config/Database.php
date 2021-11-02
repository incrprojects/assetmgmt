<?php

class Database {
    public $db_host = 'localhost';
    public $db_name = 'asset_mgmt_db';
    public $db_username = 'root';
    public $db_password = '';

    public function dbConnection($param) {
        try {
            $conn = new PDO('mysql:host=' . 
                            $this->db_host . 
                            ';dbname=' . 
                            $this->db_name, $this->db_username, $this->db_password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }
        catch(PDOException $e) {
            echo "Connection error " . $e->getMessage();
            exit;
        }
    }
}
