<?php  
    class AdminCrud {
        public static function addArticle($data, $con){
                $query = "INSERT INTO article(title, image, body) VALUES(:title, :image, :body)" ;
                $stmt = $con->prepare($query) ;
                $stmt->bindParam('title', $data['title']) ;
                $stmt->bindParam('image', $data['image']) ;
                $stmt->bindParam('body', $data['body']) ;
                $stmt->execute() ;
        }

        public function deleteArticles($id, $con){
            $query = "DELETE FROM article WHERE id= :id" ;
            $stmt = $con->prepare($query) ;
            $stmt->bindParam('id', $id) ;
            $stmt->execute() ;
        }

        public static function fetchArticles($con){
            $query = "SELECT * FROM article" ;
            $stmt = $con->query($query) ;
            return $stmt->fetchAll() ;
        }
    }