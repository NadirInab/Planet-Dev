<?php

class AdminFactory {
    
    public static function createAdmin($connection,$data){
        // echo "<pre>" ;
        //     var_dump($data) ;
        // echo "<pre>" ;

         $Admin1 = new Admin($data["fullName"],$data["email"],$data["profile"],$data["pwd"]) ;

        // echo "<pre>" ;
        //     var_dump($Admin1) ;
        // echo "<pre>" ;

        // die() ;
        // $query = "INSERT INTO admin(email, pwd, fullName,image, phone) VALUES(:email,:pass_word,:fullName,:image,:phone)" ;
        $query = "INSERT INTO admin(name,email,pwd,image) VALUES(:fullName,:email,:pass_word,:image)" ;
        $stmt = $connection->prepare($query) ;
        $stmt->bindParam(':fullName', $Admin1->fullName) ;
        $stmt->bindParam(':email', $Admin1->email) ;
        $stmt->bindParam(':pass_word', $Admin1->pwd) ;
        $stmt->bindParam(':image', $Admin1->image) ;
        $stmt->execute() ;
    }
}