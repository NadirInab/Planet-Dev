<?php 

    // 
    class DbConnection {
        private $host = "localhost" ; 
        private $user = "root" ; 
        private $pwd = "" ; 
        private $dbName = "planetdev" ;
        
        public function connect(){
            try{
                $dsn = "mysql:host=$this->host; dbname=$this->dbName" ;
                $pdo = new PDO($dsn, $this->user, $this->pwd) ;
                return $pdo ; 
            }catch(PDOException $e){
                echo "Connection is Failed".$e->getMessage() ;
            }
        }
    }