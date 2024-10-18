<?php  

class Category {
    private $conn;
    private $table_name = 'categories';

    public $id;
    public $name;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Add category
    public function addCategory(){
        $query = "INSERT INTO ".$this->table_name."(name) VALUES (:name)";
        $stmt = $this->conn->prepare($query);
        $this->name = htmlspecialchars((strip_tags($this->name)));
        $stmt->bindParam(':name', $this->name);

        return $stmt->execute();
    }

    // Get all Categories
    public function getAllCategories(){
        $query = "SELECT id, name FROM ". $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchall(PDO::FETCH_ASSOC);
    }
}


?>