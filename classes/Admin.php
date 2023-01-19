<?php  


class Admin {
    public $name ; 
    public $email ;
    private $pwd ;

    public function __construct($name , $email , $pwd){
        $this->name = $name ;
        $this->email = $email ;
        $this->pwd = $pwd ;
    }
}