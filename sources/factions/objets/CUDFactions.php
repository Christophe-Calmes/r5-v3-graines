<?php
class CUDFactions

{
    private $nbrFactions;

    public function __construct () {
        $this->nbrFactions = 6;
    }
    public function checkNbrFactionForOneUnivers ($idUnivers) {
        $select = "SELECT COUNT(`id`) AS `nbrOfFactions` FROM `factions` WHERE `idUnivers` = :idUnivers AND `valid` = 1;";
        $param = [['prep'=>':idUnivers', 'variable'=>$idUnivers]];
        $datas = ActionDB::select($select, $param, 1);
        if ($datas[0]['nbrOfFactions'] < $this->nbrFactions) {
            return 1;
        }
        return 0;
    }
    public function recordNewFaction ($param) {
        $insert = "INSERT INTO `factions`(`idUnivers`, `nomFaction`, `idAuthor`) 
        VALUES (:idUnivers, :nomFaction, :idUser);";
        ActionDB::access($insert, $param, 1);
    }
}
