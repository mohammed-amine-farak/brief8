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
public function get_data($id)
{
    $get = "SELECT * FROM product WHERE id = $id";
    $stmt = $this->db->prepare($get);
    
    $stmt->execute();
    $productdata = $stmt->fetchAll();
    $product = array();
    
   

    foreach ($productdata as $B) {
      $product[] = new product($B["id"],$B["name"],$B["old_price"], $B["new_price"],$B["image"],$B["stock"],$B["category"],$B["status"],$B["code_a_barres"],$B['offre_de_prix'],$B["quantite_min"]);
    }
    return $product;
  
     
}

    public function updateProduct($id, $name, $old_price, $new_price, $stock, $image) {
        $update = "UPDATE product SET name = :name, old_price = :old_price, new_price = :new_price, stock = :stock, image = :image WHERE id = :id";
        $stmt = $this->db->prepare($update);

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':old_price', $old_price, PDO::PARAM_INT);
        $stmt->bindParam(':new_price', $new_price, PDO::PARAM_INT);
        $stmt->bindParam(':stock', $stock, PDO::PARAM_INT);
        $stmt->bindParam(':image', $image, PDO::PARAM_STR);

        $stmt->execute();
    }


    
    public function create_product($names, $old_price, $new_price,  $stock, $categores, $code_barre, $offer_price, $quantite_min){
        for ($i = 0; $i < count($names); $i++) {
            $name = $names[$i];
            $old_price = floatval($old_price[$i]);
            $new_price = floatval($new_price[$i]);
            $stock = intval($stock[$i]);
            $category = $categores[$i];
            $quantite_min = intval($quantite_min[$i]);
            $code_barre = intval($code_barre[$i]);
            $offer_price = floatval($offer_price[$i]);

           

           $create = "INSERT INTO product(name, old_price, new_price, stock, category, status, code_a_barres, offre_de_prix, quantite_min) 
             VALUES (:name, :old_price, :new_price, :stock, :category, 'yes', :code_barre, :offer_price, :quantite_min)";
           $stmt = $this->db->prepare($create);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':old_price', $old_price);
            $stmt->bindParam(':new_price', $new_price);
         
            $stmt->bindParam(':stock', $stock);
            $stmt->bindParam(':category', $category);
            $stmt->bindParam(':code_barre', $code_barre);
            $stmt->bindParam(':offer_price', $offer_price);
            $stmt->bindParam(':quantite_min', $quantite_min);

            $stmt->execute();
        }
}


    
}

?>