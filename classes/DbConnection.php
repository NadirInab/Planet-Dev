<?php 

class DbConnection {
    private $host = "localhost" ;
    private $user = "root" ;
    private $pwd = "" ;
    private $dbName = "planetdev" ;

    public function connect(){
        try{
            $dsn = "mysql:host=$this->host; dbname=$this->dbName" ;
            $pdo = new PDO($dsn, $this->user, $this->pwd,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]) ;
            return $pdo ;
        }catch(PDOException $e){
            echo "connection is failed ".$e->getMessage() ;
        }
    }
}