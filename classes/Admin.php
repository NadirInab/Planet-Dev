<?php

class Admin{
    public $fullName;
    public $email ;
    public $pwd ;
    public $image ;

    public function __construct($fullName, $email, $image, $pwd ){
        $this->fullName = $fullName ;
        $this->email = $email ;
        $this->image = $image ;
        $this->pwd = md5($pwd) ;
    } 
} 



