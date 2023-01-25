
<?php

class AdminCrud
{

    public static function addArticle($Data, $admin_id, $connection)
    {
        $Article1 = new Article($Data["title"], $Data["image"], $Data["body"], $admin_id);
        $query = "INSERT INTO article(title,image,body,admin_id) VALUES(:title,:image,:body,:admin_id)";
        $stmt = $connection->prepare($query);
        $stmt->bindParam(':title', $Article1->title);
        $stmt->bindParam(':image', $Article1->image);
        $stmt->bindParam(':body', $Article1->body);
        $stmt->bindParam(':admin_id', $Article1->admin_id);
        $stmt->execute();
    }

    public static function deleteArticle($id, $connection)
    {
        $query = "DELETE FROM article WHERE id = :id ";
        $stmt = $connection->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public static function upDateArticle($data, $connection)
    {
        $query = "UPDATE article SET  title = :title,image = :image ,body = :body WHERE id = :id ";
        $stmt = $connection->prepare($query);
        $stmt->bindParam(':id', $data["id"]);
        $stmt->bindParam(':title', $data["title"]);
        $stmt->bindParam(':body', $data["body"]);
        $stmt->bindParam(':image', $data["image"]);
        $stmt->execute();
    }
}
