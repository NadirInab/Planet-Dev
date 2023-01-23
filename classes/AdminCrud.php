
<?php

class AdminCrud {
    
    public static function addArticle($Data, $admin_id,$connection){
        $Article1 = new Article($Data["title"],$Data["image"],$Data["body"] , $admin_id) ;
        // $query = "INSERT INTO book(isbn,title,type,image,publish_date,admin_id) VALUES(:isbn, :title, :bookType,:image,:publish_date,:admin_id)" ;
        $query = "INSERT INTO article(title,image,body,admin_id) VALUES(:title,:image,:body,:admin_id)" ;
        $stmt = $connection->prepare($query) ;
        $stmt->bindParam(':title', $Article1->title);
        $stmt->bindParam(':image', $Article1->image) ;
        $stmt->bindParam(':body', $Article1->body) ;
        $stmt->bindParam(':admin_id', $Article1->admin_id) ;
        $stmt->execute() ;
    }

    public static function deleteArticle($id, $connection){
        $query = "DELETE FROM article WHERE id = :id " ;
        $stmt = $connection->prepare($query) ;
        $stmt->bindParam(':id', $id ) ;
        $stmt->execute();
        }

    public static function upDateBook($data, $connection){
        $query = "UPDATE book SET  title = :title, type = :bookType ,image = :image ,publish_date = :publish_date WHERE isbn = :isbn " ;
        $stmt = $connection->prepare($query) ;
        $stmt->bindParam(':isbn', $data["isbn"]);
        $stmt->bindParam(':title', $data["title"]);
        $stmt->bindParam(':bookType', $data["type"]);
        $stmt->bindParam(':image', $data["image"]) ;
        $stmt->bindParam(':publish_date', $data['publish_date']) ;
        $stmt->execute();
        }
}