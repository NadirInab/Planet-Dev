<?php  
    class AdminCrud {
        public static function addArticle($data, $con){
            // dd($_POST) ;
            // die() ;
            for($i = 0 ; $i< 2 ; $i++){
                $query = "INSERT INTO article(title, image, body) VALUES(:title, :image, :body)" ;
                $stmt = $con->prepare($query) ;
                $stmt->bindParam('title', $data['title']) ;
                $stmt->bindParam('image', $data['image']) ;
                $stmt->bindParam('body', $data['body']) ;
                $stmt->execute() ;
            }
        }
    }