<?php

class LoginService extends Database {

    public function __construct(){
        parent::__construct();
    }

    public function listUsers(){
        parent::setSqltxt(
            "SELECT * FROM [users]"
        );
        return parent::queryAll();
    }

}