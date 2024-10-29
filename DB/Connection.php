<?php 

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'crud_oop');

class Connection {
    public $db;
    public function __construct(){
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if(!$conn){
            die("Gagal terhubung ke database: " . mysqli_connect_error());
        } else {
            $this->db = $conn;
            return $this->db;
        }
    }
}