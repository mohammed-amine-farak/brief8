<?php
        //id										

   class product{
    

    private $id;
    private $name;
    private $old_price;
    private $new_price;
    private $image;
    private $stock;
    private $category;
    private $status;
    private $code_a_barres;
    private $offre_de_prix;
    private $quantite_min;		
    
    public function __construct($id, $name, $old_price, $new_price, $image, $stock, $category, $status, $code_a_barres, $offre_de_prix, $quantite_min)
{
    $this->id = $id;
    $this->name = $name;
    $this->old_price = $old_price;
    $this->new_price = $new_price;
    $this->image = $image;
    $this->stock = $stock;
    $this->category = $category;
    $this->status = $status;
    $this->code_a_barres = $code_a_barres;
    $this->offre_de_prix = $offre_de_prix;
    $this->quantite_min = $quantite_min;
}


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of old_price
     */ 
    public function getOld_price()
    {
        return $this->old_price;
    }

    /**
     * Get the value of new_price
     */ 
    public function getNew_price()
    {
        return $this->new_price;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Get the value of stock
     */ 
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Get the value of category
     */ 
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get the value of code_a_barres
     */ 
    public function getCode_a_barres()
    {
        return $this->code_a_barres;
    }

    /**
     * Get the value of offre_de_prix
     */ 
    public function getOffre_de_prix()
    {
        return $this->offre_de_prix;
    }

    /**
     * Get the value of quantite_min
     */ 
    public function getQuantite_min()
    {
        return $this->quantite_min;
    }
}
?>