<?php 

class Database {
    private $host = 'localhost';
    private $db_name = 'royal_havens_db';
    private $userName = 'root';
    private $password = '';

    public $conn;

    public function getConnection(){
        $this->conn = null;

        try{
            $this->conn = new PDO("mysql:host=" . $this->host . "; dbname=" . $this->db_name, $this->userName, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //  echo "Connection Succesful!";
        }catch (PDOException $exception){
             echo "Connection error: " .$exception->getMessage();
        }

        return $this->conn;
    }
}


?>