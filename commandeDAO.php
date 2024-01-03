<?php
require_once('connction.php');
require_once('commande.php');


class commandeDAO{
    private $db;
    public function __construct(){
        $this->db = Database::getInstance()->getConnection(); 
 }
 
 public function add_Commande($idclient,$idproducts){
  //date actuelle
  $prix_total_query = "SELECT new_price FROM product WHERE id = :idproducts";
    $run = $this->db->prepare($prix_total_query);
    $run->bindParam(':idproducts', $idproducts, PDO::PARAM_INT);
    $run->execute();

    $row = $run->fetch(PDO::FETCH_ASSOC);
    $prix_total = $row['new_price'];

    echo $prix_total;

  $verifier_existance_commande = "SELECT * FROM commande WHERE idclient = :idclient AND etat LIKE '%EN attente%'";
  $stmt = $this->db->prepare($verifier_existance_commande);
  $stmt->bindParam(':idclient', $idclient, PDO::PARAM_INT);
  $stmt->execute();
  
  $affected_rows = $stmt->rowCount();

  if (!$stmt || $affected_rows == 0) {
      $inserer = "INSERT INTO commande(date_creation, date_envoi, date_livraison, prix_total, idclient, etat) VALUES (:dateActuelle, NULL, NULL, :prix_total, :idclient, 'EN attente')";
      
      $inserer_commande = $this->db->prepare($inserer);
      $inserer_commande->bindParam(':dateActuelle', $dateActuelle, PDO::PARAM_STR);
      $inserer_commande->bindParam(':idclient', $idclient, PDO::PARAM_INT);
      $inserer_commande->bindParam(':prix_total',$prix_total, PDO::PARAM_INT);
      $inserer_commande->execute();
      
      $id_com = $this->db->lastInsertId();
      
     

      return $id_com;
  } else {
      
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      $idcom = $row['idcom'];
      $update_prix_total_query = "UPDATE commande SET prix_total = (SELECT SUM(quantite * prix_unitaire) FROM commande_produit WHERE idcom = :idcom) WHERE idcom = :idcom";
      $stmt = $this->db->prepare($update_prix_total_query);
      $stmt->bindParam(':idcom', $idcom, PDO::PARAM_INT);
      $stmt->execute();
      return $idcom;
  }
}

}

?>