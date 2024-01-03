<?php
class factur{
    private $userName;
    private $productName;
    private $quantite;
    private $prixUnitaire;
    private $prixTotal;
   
    public function __construct($userName,$productName,$quantite,$prixUnitaire,$prixTotal,$prixcomandeTotal)
    {
       $this->userName  = $userName;
       $this->productName = $productName;
       $this->quantite = $quantite;
       $this->prixUnitaire = $prixUnitaire;
       $this->prixTotal = $prixTotal;
       
       
    }


    /**
     * Get the value of productName
     */ 
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * Get the value of quantite
     */ 
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Get the value of prixUnitaire
     */ 
    public function getPrixUnitaire()
    {
        return $this->prixUnitaire;
    }

    /**
     * Get the value of prixTotal
     */ 
    public function getPrixTotal()
    {
        return $this->prixTotal;
    }

    /**
     * Get the value of userName
     */ 
    public function getUserName()
    {
        return $this->userName;
    }
}
?>