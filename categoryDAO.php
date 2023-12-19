<?php
require_once 'connexion.php';
require_once 'Book.php';
class produitDAO{
         private $db;
         public function __construct(){
             $this->db = Database::getInstance()->getConnection(); 
         }

         public function get_category(){
             $query = "SELECT * FROM categry";
             $stmt = $this->db->query($query);
             $stmt -> execute();
             $categorydata = $stmt->fetchAll();
             $category = array();
         foreach ($categorydata as $B) {
                $category[] = new Book($B["id"],$B["name"],$B["description"], $B["image"]);
             }
             return $category;
          
         }

}

      public function insert($product){
      $query = "INSERT INTO produit() values ()";
      $stmt = $this->db->query($query);
      $stmt -> execute();
      return $stmt;
      } 

    // public function update(){
    //    $query = "UPDATE produit set référence = $référence étiquette = $étiquette code_à_barres = $code_à_barres prix_d’achat = $prix_d’achat prix_final = $prix_final Offre_de_prix = $Offre_de_prix description = $description quantite_min = $quantite_min quantite_stock = $quantite_stock image = $image where id = $id ";
    //    $stmt = $this->db->query($query);
    //    $stmt -> execute();
    //    return $stmt;
    
    // }
    // public function masque($id){
    //     $query = "SELECT statu from produit where id = $id";
    //     $stmt = $this->db->query($query);
    //     $stmt -> execute();
        
    // }
?>