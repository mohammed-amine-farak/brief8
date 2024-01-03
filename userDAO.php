<?php

require_once 'connction.php';
require_once 'user.php';
class usersDAO{
    private $pdo;
    public function __construct(){
        $this->pdo = Database::getInstance()->getConnection(); 
    }

    public function add_User($username, $email, $phone, $adresse, $ville, $password) {
        // Check if email is already in use
        if ($this->isEmailTaken($email)) {
            // Email is already in use, handle accordingly (throw an error, return false, etc.)
            // For example, you might throw an exception:
           echo 'email use anther email ';
        }
    
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
        // Use prepared statements to prevent SQL injection
        $query = "INSERT INTO users (username, email, phone, adresse, ville, password) 
                  VALUES (:username, :email, :phone, :adresse, :ville, :password )";
        
        $stmt = $this->pdo->prepare($query);
    
        // Bind parameters
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':adresse', $adresse);
        $stmt->bindParam(':ville', $ville);
        $stmt->bindParam(':password', $hashedPassword);
         // Assuming 'type' should have a default value
    
        // Execute the statement
        $stmt->execute();
    }
    
    // Function to check if email is already in use
    private function isEmailTaken($email) {
        $query = "SELECT COUNT(*) FROM users WHERE email = :email";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return $count > 0;
    }
    
    public function get_Users(){
        $query1 = "SELECT * FROM users";
        $stmt = $this->pdo->prepare($query1);
        $stmt->execute();
        $usersList = $stmt->fetchAll();
        $users = array();
        foreach ($usersList as $user) {
            $users[] = new user($user["id"],$user["username"],$user["email"] ,$user["phone"],$user["adresse"],$user["ville"],$user["password"],$user["type"]);
        }         //$id,$username,$email,$phone,$adresse,$ville,$password,$type

        return $users;
    }
    public function chang_type_to_user($id,$selectedValue){
        $query1 = "UPDATE users set type = '$selectedValue' where id like $id ";
        $stmt = $this->pdo->prepare($query1);
        $stmt->execute();

    }
    public function authenticateUser($email, $password)
    {
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Authentication successful
            if ($user['type'] === 'user') {
                $_SESSION['user'] = $user['id'];
                header("Location:pagnationforuser.php");
                exit();
            } elseif ($user['type'] === 'admin') {
                $_SESSION['admin'] = $user['id'];
                header("Location:listOfproduct.php");
                exit();
            } else {
                header("Location:log-in.php");
                exit();
            }
        } else {
            // Authentication failed
            echo '<div class="absolute mt-20">Email or password is wrong. Please check.</div>';
        }
    }
    
    // ... (existing code)
}





?>
