<?php

namespace MODELS;

use Exception;

class Account{

    private string $username;
    private string $fullname;

    public function __construct($username,$fullname){
        $this->setUsername($username);
        $this->setFullname($username);
    }

    public function setUsername(string $username){
        if($username === "" || $username == null) throw new Exception("Username can't be empty");
        $this->username = $username;
    }

    public function setFullname(string $fullname){
        if($fullname === "" || $fullname == null) throw new Exception("Name can't be empty");
        $this->fullname = $fullname;
    }

    public function getUsername(){
        return $this->username;
    }

    public function getFullname(){
        return $this->fullname;
    }
}
?>