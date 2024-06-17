<?php
class sqlUnivers 
{
    protected $nt;
    protected $maxOfUnivers;
    public function __construct () {
        $this->nt = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16];
        $this->maxOfUnivers = 6;
    }
    protected function countYourUnivers($valid) {
        $findIdAuthor = new Controles ();
        $idAuthor = $findIdAuthor->idUser($_SESSION);
        $param = [['prep'=>':idAuthor', 'variable'=>$idAuthor],
                ['prep'=>':valid', 'variable'=>$valid]];
        $select ="SELECT COUNT(`id`) AS nbrUnivers FROM `univers` WHERE `idAuthor` = :idAuthor AND `valid` = :valid;";
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
}
