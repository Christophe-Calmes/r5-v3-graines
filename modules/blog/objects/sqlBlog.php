<?php
class SQLBlog 
{
    public function creatNewArticle ($param) {
        $insert = "INSERT INTO `articles`(`author`, `title`, `article`,`publish`) VALUES (:idUser, :title, :article, :publish);";
        return ActionDB::access($insert, $param, 2);
    }
    protected function getLastArticle () {
        $select = "SELECT `id`, `author`, `title`, `article`, `valid`, `publish`, `creat_date`, `update_date` 
        FROM `articles` 
        ORDER BY `id` DESC LIMIT 1;";
        return ActionDB::select($select, [], 2)[0];
    }

}
