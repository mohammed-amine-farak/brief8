<?php
require_once('connction.php');
require_once('commande_product.php');
require_once('facture.php');


class commande_proDAO{
    private $db;
    public function __construct(){
        $this->db = Database::getInstance()->getConnection(); 
 }
 public function add_commande_product($idcom, $idproduct) {
    // Check if the product already exists in the command
    $existing_product_query = "SELECT * FROM commande_produit WHERE idcom = :idcom AND idproduit = :idproduct";
    $stmt = $this->db->prepare($existing_product_query);
    $stmt->bindParam(':idcom', $idcom, PDO::PARAM_INT);
    $stmt->bindParam(':idproduct', $idproduct, PDO::PARAM_INT);
    $stmt->execute();

    $new_quantity = 0;
     
    // If the product exists, update the quantity
    if ($existing_product_row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $new_quantity = $existing_product_row['quantite'] + 1;
        $update_quantity_query = "UPDATE commande_produit SET quantite = :new_quantity, prix_total = prix_unitaire * :new_quantity WHERE idproduit = :idproduct AND idcom = :idcom";
        $stmt = $this->db->prepare($update_quantity_query);
        $stmt->bindParam(':new_quantity', $new_quantity, PDO::PARAM_INT);
        $stmt->bindParam(':idproduct', $idproduct, PDO::PARAM_INT);
        $stmt->bindParam(':idcom', $idcom, PDO::PARAM_INT);
        $stmt->execute();
       

       
    } else {
        // If the product doesn't exist, insert a new record
        $get_prix_unitaire_query = "SELECT new_price FROM product WHERE id = :idproduct";
        $stmt = $this->db->prepare($get_prix_unitaire_query);
        $stmt->bindParam(':idproduct', $idproduct, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $prix_unitaire = $row['new_price'];
            
            $insert_product_query = "INSERT INTO commande_produit (idcom, idproduit, quantite, prix_unitaire, prix_total) VALUES (:idcom, :idproduct, 1, :prix_unitaire, :prix_unitaire)";
            $stmt = $this->db->prepare($insert_product_query);
            $stmt->bindParam(':idcom', $idcom, PDO::PARAM_INT);
            $stmt->bindParam(':idproduct', $idproduct, PDO::PARAM_INT);
            $stmt->bindParam(':prix_unitaire', $prix_unitaire, PDO::PARAM_STR);
            $stmt->execute();

        }
      
    }
}


public function factur($iduser){
     $select_commande_of_user = "SELECT product.name,commande_produit.quantite,commande_produit.prix_unitaire,users.username,commande_produit.prix_total FROM
     product JOIN commande_produit JOIN commande JOIN users
     WHERE product.id = commande_produit.idproduit and commande_produit.idcom = commande.idcom AND commande.idclient = users.id and users.username = $iduser";
    
         $stmt = $this->db->prepare($select_commande_of_user);
         
         $stmt->execute();
         $facturedata = $stmt->fetchAll();
         $facture = array();
         
        
     
         foreach ($facturedata as $f) {
           $product[] = new factur($f['users.username'],$f['product.name'],$f['commande_produit.quantite'],$f['commande_produit.prix_unitaire'],$f['commande_produit.prix_total']);
         }
         return $facture;
       
          
     }





}