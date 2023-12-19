<?php
require_once('connexion.php');
require_once('user.php');

class adminDAO
{
    private $db;
    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }
    public function login()
    {
       
    }



}
