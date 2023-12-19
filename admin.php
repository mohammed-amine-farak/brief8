<?php
class admin {
    private $name;
    private $email;
    private $password;
    
    
    public function __construct($name, $email, $password){
        $this->name = $name;
        $this->email = $email;
        $this->pas = $image;
       
    }


    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
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