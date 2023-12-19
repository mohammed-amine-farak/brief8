<?php

class login {
    private $db;
    public function __construct(){
        $this->db = Database::getInstance()->getConnection(); 
    }
    public function login($person){
        
    }
}

?>