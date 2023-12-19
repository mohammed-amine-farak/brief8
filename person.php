<?php
  class person {
    private $name;
    private $adrees;
    private $ville;
    private $phone;
    private $email;
    private $password;
    public function __construct($name,$adrees,$ville,$phone, $email, $password){
        $this->name = $name;
        $this->adress = $adrees;
        $this->ville = $ville;
        $this->phone = $phone;
        $this->email = $email;
        $this->password = $password;
    }


    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of adrees
     */ 
    public function getAdrees()
    {
        return $this->adrees;
    }

    /**
     * Set the value of ville
     *
     * 
     */ 
   

    /**
     * Get the value of ville
     */ 
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Get the value of phone
     */ 
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }
  }
?>