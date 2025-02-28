<?php
class SQLBlog 
{
    private function getLastid () {
        $select = "SELECT `id` AS `idArticle` FROM `articles` ORDER BY `id` DESC LIMIT 1;";
        return ActionDB::select($select, [], 2)[0]['idArticle'];
    }
    private function recordCategorieArticle ($id_subject) {
        $id_article = $this->getLastid ();
        $insert ="INSERT INTO `link_subject_article`(`id_subject`, `id_article`) VALUES (:id_subject, :id_article);";
        $param = [['prep'=>':id_subject', 'variable'=>$id_subject],
                    ['prep'=>':id_article', 'variable'=>$id_article]];
        ActionDB::access($insert, $param, 2);
    }
    public function creatNewArticle ($param, $id_subject) {
        $insert = "INSERT INTO `articles`(`author`, `title`, `article`,`publish`) VALUES (:idUser, :title, :article, :publish);";
        ActionDB::access($insert, $param, 2);
        $this->recordCategorieArticle ($id_subject);
        return true;
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
        $select = "SELECT `id_subject`, `id_article`, `articles`.`id` AS `idArticle`, `author`, `title`, `article`, `articles`.`valid`, `publish`, `articles`.`creat_date`, `articles`.`update_date`, `subject`
                    FROM `link_subject_article` 
                    INNER JOIN `articles` ON `id_article` = `articles`.`id`
                    INNER JOIN `subjects` ON `id_subject` = `subjects`.`id`
                    ORDER BY `articles`.`id` DESC LIMIT 1;";
        $lastArticle = ActionDB::select($select, [], 2);
        if(!empty($lastArticle)) {
            return $lastArticle[0];
        }
        return false;
    }
    protected function getAllCategories ($valid) {
        $select ="SELECT `id`, `subject`, `creat_date`, `update_date`, `valid` 
        FROM `subjects` 
        WHERE `valid` = :valid
        ORDER BY `subject`;";
        $param = [['prep'=>':valid', 'variable'=>$valid]];
        return ActionDB::select($select, $param, 2);
    }
    public function numberOfArticle ($idSubject) {
        $select = "SELECT COUNT(`id_article`) AS `nbrArticle` 
        FROM `link_subject_article`  WHERE `id_subject` = :idSubject";
        $param = [['prep'=>':idSubject', 'variable'=>$idSubject]];
        return ActionDB::select($select, $param, 2)[0]['nbrArticle'];
    }
    public function nameSubject ($idSubject) {
        $select = "SELECT `subject` FROM `subjects` WHERE `id` = :idSubject;";
        $param = [['prep'=>':idSubject', 'variable'=>$idSubject]];
        return ActionDB::select($select, $param, 2)[0]['subject'];
    }
    protected function getArticlePagination($firstPage, $parPage, $idSubject) {
        $select = "SELECT 
        `articles`.`id` AS `idArticle`, 
        `author`, 
        `title`, 
        `article`, 
        `articles`.`valid` AS `validArticle`, 
        `publish`, 
        `articles`.`creat_date` AS `creatArticleDate`, 
        `articles`.`update_date` AS `updateArticleDate`,
        `subject`
        FROM `link_subject_article`
        INNER JOIN `articles` ON `articles`.`id` = `id_article`
        INNER JOIN `subjects` ON `id_subject` = `subjects`.`id`
        WHERE `id_subject` = :idSubject
        LIMIT {$firstPage}, {$parPage};";
        $param = [['prep'=>':idSubject', 'variable'=>$idSubject]];
        return ActionDB::select($select, $param, 2);
    }
    protected function getOneArticle ($idArticle, $valid) {
        $select = "SELECT `articles`.`id` AS `idArticle`, `author`, `title`, `article`, `articles`.`valid`, `publish`, `articles`.`creat_date`, `articles`.`update_date`,  `subject`
                FROM `articles`
                INNER JOIN `link_subject_article` ON `articles`.`id` = `id_article`
                INNER JOIN `subjects` ON `id_subject` = `subjects`.`id`
                WHERE `articles`.`id` = :idArticle AND `articles`.`valid` = :idValid;";
        $param = [['prep'=>':idArticle', 'variable'=>$idArticle],
                    ['prep'=>':idValid', 'variable'=>$valid]];
        return ActionDB::select($select, $param, 2)[0];

    }
}
