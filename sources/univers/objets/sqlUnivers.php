<?php
class SQLUnivers 
{
    protected $nt;
    protected $maxOfUnivers;
    public function __construct () {
        $this->nt = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16];
        $this->maxOfUnivers = 6;
    }
    private function checkUserID () {
        $findIdAuthor = new Controles ();
        return  $findIdAuthor->idUser($_SESSION);
    }
    protected function getOneUnivers ($idUnivers, $valid) {
        $idAuthor = $this->checkUserID ();
        $param = [['prep'=>':idUnivers', 'variable'=>$idUnivers],
                    ['prep'=>':idAuthor', 'variable'=>$idAuthor],
                    ['prep'=>':valid', 'variable'=>$valid]];
        $select = "SELECT `id` AS `idUnivers`, `nameUnivers`, `idAuthor`, `nt`, `valid` 
                    FROM `univers` 
                    WHERE `id` = :idUnivers 
                    AND `idAuthor`=:idAuthor
                    AND `valid`=:valid;";
        return ActionDB::select($select, $param, 1);
    }
    protected function listOfYourUnivers ($valid) {
        $idAuthor = $this->checkUserID ();
        $param = [['prep'=>':idAuthor', 'variable'=>$idAuthor],
        ['prep'=>':valid', 'variable'=>$valid]];
        $select ="SELECT `id` AS `idUnivers`, `nameUnivers`, `nt` FROM `univers` WHERE `idAuthor` = :idAuthor AND `valid` = :valid ORDER BY `nameUnivers`;";
        return ActionDB::select($select, $param, 1); 
    }
    protected function countYourUnivers($valid) {
        $idAuthor = $this->checkUserID ();
        $param = [['prep'=>':idAuthor', 'variable'=>$idAuthor],
                ['prep'=>':valid', 'variable'=>$valid]];
        $select ="SELECT COUNT(`id`) AS nbrUnivers FROM `univers` WHERE `idAuthor` = :idAuthor AND `valid` = :valid;";
        return ActionDB::select($select, $param, 1); 
    }
    protected function listOfFaction ($idUnivers) {
        $select = "SELECT `id` AS `idFaction`,`nomFaction` FROM `factions` WHERE `idUnivers` = :idUnivers AND `valid`= 1;";
        $param = [['prep'=>':idUnivers', 'variable'=>$idUnivers]];
        return ActionDB::select($select, $param, 1);
    }
    public function checkNT ($nt) {
        if(in_array($nt, $this->nt)) {
            return 1;
        }
        return 0;
    } 
    public function maxUnivers () {
        $numberOfUnivers = $this->countYourUnivers(1);
        if($numberOfUnivers[0]['nbrUnivers'] < $this->maxOfUnivers) {
            return 1;
        }
        return 0;
    }
    public function insertNewUnivers ($param) {
        $insert = "INSERT INTO `univers`(`nameUnivers`,  `nt`, `idAuthor`) VALUES (:nameUnivers, :nt, :idUser);";
        return ActionDB::access($insert, $param, 1);
    }
    public function deleteUnivers ($param) {
        $delete = "DELETE FROM `univers` WHERE `id`=:id AND `idAuthor`=:idUser;";
        return ActionDB::access($delete, $param, 1);
    }
    public function updateUnivers ($param) {
        $update = "UPDATE `univers` SET `nameUnivers`=:nameUnivers,`nt`=:nt WHERE `id`=:id AND `idAuthor`=:idUser;";
        return ActionDB::access($update, $param, 1);
    }
    public function universOwner ($idUnivers) {
        $select = "SELECT COUNT(`id`) AS `nbrUnivers` 
                    FROM `univers` 
                    WHERE `id` = :idUnivers AND `idAuthor` = :idUser;";
              $param = [['prep'=>':idUnivers', 'variable'=>$idUnivers],
              ['prep'=>':idUser', 'variable'=>$this->checkUserID ()]];
        $checkUnivers = ActionDB::select($select, $param, 1);
        return $checkUnivers[0]['nbrUnivers'];
    }
}
