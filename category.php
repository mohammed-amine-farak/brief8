<?php
class category {
    private $nom;
    private $description;
    private $image;
  

    public function __construct($nom, $description, $image){
        $this->nom = $nom;
        $this->description = $description;
        $this->image = $image;
       
    }


   

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }
}
?>