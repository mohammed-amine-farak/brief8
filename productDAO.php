<?php
require_once 'connction.php';
require_once 'product.php';
class produitDAO{
    private $db;
    public function __construct(){
        $this->db = Database::getInstance()->getConnection(); 
 }

    public function get_product(){
        $query = "SELECT * FROM product where category in (select name from category where statu = 'yes')";
        $stmt = $this->db->query($query);
        $stmt -> execute();
        $productdata = $stmt->fetchAll();
        $produit = array();
        
       

        foreach ($productdata as $B) {
          $produit[] = new product($B["id"],$B["name"],$B["old_price"], $B["new_price"],$B["image"],$B["stock"],$B["category"],$B["status"],$B["code_a_barres"],$B['offre_de_prix'],$B["quantite_min"]);
        }
        return $produit;
     
    }
    public function seeicon($see)
{
    $get_data1 = "SELECT status FROM product WHERE id LIKE $see";
    $stmt = $this->db->prepare($get_data1);
   
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result['status'] !== 'yes') {
        $update = "UPDATE product SET status = 'yes' WHERE id LIKE $see";
        $stmt = $this->db->prepare($update);
       
        $stmt->execute();
    }
}

public function not_see($not_see)
{
    $get_data2 = "SELECT status FROM product WHERE id LIKE $not_see";
    $stmt = $this->db->prepare($get_data2);
   
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result['status'] !== 'no') {
        $update = "UPDATE product SET status = 'no' WHERE id LIKE $not_see";
        $stmt = $this->db->prepare($update);
      
        $stmt->execute();
    }
}
public function get_product_by_id($id)
{
    $get = "SELECT * FROM product WHERE id = :id";
    $stmt = $this->db->prepare($get);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $productdata = $stmt->fetchAll();
    $produit = array();
    
   

    foreach ($productdata as $B) {
      $produit[] = new product($B["id"],$B["name"],$B["old_price"], $B["new_price"],$B["image"],$B["stock"],$B["category"],$B["status"],$B["code_a_barres"],$B['offre_de_prix'],$B["quantite_min"]);
    }
    return $produit;
  
     
}


    
}

?>