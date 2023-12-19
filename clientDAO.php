<?php
require_once 'connexion.php';
require_once 'client.php';
class clientDAO{
         private $db;
         public function __construct(){
         $this->db = Database::getInstance()->getConnection(); 
         }

         public function get_person(){
             $query = "SELECT * FROM person";
             $stmt = $this->db->query($query);
             $stmt -> execute();
             $person = $stmt->fetchAll();
             $person= array();
         foreach ($person as $B) {
                $category[] = new person($B["id"],$B["name"],$B["name"], $B["id"]);
             }
             return $person;
          
         }

}

      public function addclient($person,$id){
      $query = "INSERT INTO clinte (name ,email,password) values
       (".$person->getName().",".$person->getpassword().",".$person->getemail().")";
      $query2 = "DELETE from person where id = $id";
      $stmt = $this->db->query($query);
      $stmt2 = $this->db->query($query2);
       $stmt -> execute();
       $stmt2 -> execute();
       return $stmt;
      } 

    public function annluer($id){
        $query = "DELETE from person where id = $id";
       $stmt = $this->db->query($query);
       $stmt -> execute();
       return $stmt;
    
    }
    
?>