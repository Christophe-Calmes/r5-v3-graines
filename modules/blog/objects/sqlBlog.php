<?php
class SQLBlog 
{
    public function creatNewArticle ($param) {
        $insert = "INSERT INTO `articles`(`author`, `title`, `article`,`publish`) VALUES (:idUser, :title, :article, :publish);";
        return ActionDB::access($insert, $param, 2);
    }
    public function creatNewCategorie ($param) {
        $insert = "INSERT INTO `subjects`( `subject`) VALUES (:subject);";
        return ActionDB::access($insert, $param, 2);
    }
    public function idCategorieExist ($id) {
        $select = "SELECT COUNT(`id`) AS `nbrCategorie` FROM `subjects` WHERE `id` = :id;";
        $param = [['prep'=>':id', 'variable'=>$id]];
        if(ActionDB::select($select, $param, 2)[0]['nbrCategorie'] == 1) {
            return true;
        }
        return false;
    }
    public function updateCategorie ($param) {
        $update = "UPDATE `subjects` 
        SET `subject`=:subject,`update_date`= NOW(),`valid`=:valid 
        WHERE `id`=:id;";
        return ActionDB::access($update, $param, 2);
    }
    protected function getLastArticle () {
        $select = "SELECT `id`, `author`, `title`, `article`, `valid`, `publish`, `creat_date`, `update_date` 
        FROM `articles` 
        ORDER BY `id` DESC LIMIT 1;";
        return ActionDB::select($select, [], 2)[0];
    }
    protected function getAllCategories ($valid) {
        $select ="SELECT `id`, `subject`, `creat_date`, `update_date`, `valid` 
        FROM `subjects` 
        WHERE `valid` = :valid
        ORDER BY `subject`;";
        $param = [['prep'=>':valid', 'variable'=>$valid]];
        return ActionDB::select($select, $param, 2);
    }

}
