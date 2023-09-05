<?php
//recuperer les commentaires ds la bdd


function getComments(PDO $pdo, int $limit = null, int $page = null ):array|bool
{
    $sql = "SELECT * FROM comments ORDER BY id DESC";
    if ($limit && !$page) {
        $sql .= " LIMIT :limit";
    }
    if ($limit && $page) {
        $sql .= " LIMIT :offset, :limit";
    }

    $query = $pdo->prepare($sql);

    if ($limit) {
        $query->bindValue(":limit", $limit, PDO::PARAM_INT);
    }
    if ($page) {
        $offset = ($page -1) * $limit;
        $query->bindValue(":offset", $offset, PDO::PARAM_INT);
    }
        $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    return $result;
    }
    


    
    function saveComments (PDO $pdo, string $name_Client, string $content, int $note, int $id = null):bool
    {
        if($id === null) {
            $query = $pdo->prepare("INSERT INTO comments (name_Client, content, note) "
            ."VALUES(:name_Client, :content, :note)");
        } else {
            $query =$pdo->prepare("UPDATE `comments` SET `name_Client` = :name_Client,"
            ."`content` = :content, "
            ."note = :note WHERE `id` = :id;");
            $query->bindValue(':id', $id, $pdo::PARAM_INT);
    }
    $query->bindValue(':name_Client', $name_Client, $pdo::PARAM_STR);
    $query->bindValue(':content', $content, $pdo::PARAM_STR);
    $query->bindValue(':note', $note, $pdo::PARAM_STR);
    
    return $query->execute();  
    }


    
function getCommentById (PDO $pdo, int $id):array|bool
{
    $query = $pdo->prepare("SELECT * FROM comments WHERE id = :id");
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
}

function getTotalComments(PDO $pdo):int|bool
{
    $sql = "SELECT COUNT(*) as total FROM comments";
    $query = $pdo->prepare($sql);
    $query->execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result['total'];
}

function deleteComment(PDO $pdo, int $id):bool
{
    $query = $pdo->prepare("DELETE FROM comments WHERE id = :id");
    $query->bindValue(':id', $id, $pdo::PARAM_INT);

    $query->execute();
    if ($query->rowCount() > 0) {
        return true;
    } else {
        return false;
    }
}