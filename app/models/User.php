<?php 
    class User {
        private $table = 'users';
        public $id;
        public $username;
        public $password;
        public $email;

        public $first_name;
        public $last_name;
        public $phone;
        public $birthdate;
        public $organization;
        public $location;
        public $profile_image;
        public $created_at;
        public $updated_at;
        
        private $conn;

        public function __construct() {  
            $this->conn = Database::getInstance()->getConnection();
        }

        // Insert a user into users table
        public function store() {
            $query = "INSERT INTO $this->table (username, email, password) VALUES (:username, :email, :password)";
            $stmt = $this->conn->prepare($query);
            $this->username = htmlspecialchars(strip_tags($this->username));
            $this->email = htmlspecialchars(strip_tags($this->email));
            $hashedPassword = password_hash($this->password, PASSWORD_BCRYPT);
         
            $stmt->bindParam(':username', $this->username);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':password', $hashedPassword);

            if($stmt->execute()) {
                return true;
            }
            return false;
        }

        // Login a user
        public function login() {
            $query = "SELECT * FROM $this->table WHERE email = :email";
            $stmt = $this->conn->prepare($query);

            $this->email = sanitize($this->email);
            $stmt -> bindParam(':email', $this->email);
            $stmt->execute();

            $dbUser = $stmt->fetch(PDO::FETCH_OBJ);

            if($dbUser && password_verify($this->password, $dbUser->password)) {
                $this->id = $dbUser->id;
                $this->username = $dbUser->username;
                $this->first_name = $dbUser->first_name;
                $this->last_name = $dbUser->last_name;

                return true;
            } else {
                return false;
            }
        }
    }

?>