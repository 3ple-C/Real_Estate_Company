<?php
class User {
    private $conn;
    private $table_name = 'users';

    public $id;
    public $name;
    public $email;
    public $password;
    public $role;

    // Initialization: get first response once an instnce is created at any point. This is done by __construct
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Action to be carried out
    public function register()
    {
        $query = "INSERT INTO " . $this->table_name . "(name,email,password,role) VALUES (:name, :email, :password, :role)";

        // Prepare the statement
        $stmt = $this->conn->prepare($query);

        // Cleaning the DB
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
        $this->role = htmlspecialchars(strip_tags($this->role));

        // Bind the parameters
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":role", $this->role);

        // Executing the query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Check if inputed email exist for login & signup
    public function emailExists()
    {
        $query = "SELECT id, name, password, role FROM " . $this->table_name . " WHERE email = :email LIMIT 1";

        //Prepare the statement
        $stmt = $this->conn->prepare($query);

        // Clean the email
        $this->email = htmlspecialchars(strip_tags($this->email));

        // Bind the email parameter
        $stmt->bindParam(":email", $this->email);

        // Execute the query
        $stmt->execute();

        // Check if any row exists
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->id = $row['id'];
            $this->name = $row['name'];
            $this->password = $row['password'];
            $this->role = $row['role'];

            return true;
        }

        return false;
    }

    // Login User
    public function login($email, $password)
    {
        // Check if email exists
        $this->email = $email;

        if ($this->emailExists()) {
            // Verify password
            if (password_verify($password, $this->password)) {
                return true; // Login Successful
            }
        }
    }
}




?>