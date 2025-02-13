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
    public function deleteOneFactionByUser ($param) {
        $delete = "DELETE FROM `factions` WHERE `id`=:id AND `idAuthor`=:idUser;";
        ActionDB::access($delete, $param, 1);
    }
    public function updateNomFactionByUser ($param) {
       $update = "UPDATE `factions` SET `nomFaction`=:nomFaction WHERE `id` = :id AND `idAuthor` = :idUser;";
       ActionDB::access($update, $param, 1);
    }
    public function factionOwner ($idFaction) {
        $idUser = new Controles ();
        $select = "SELECT COUNT(`id`) AS `nbrFaction` FROM `factions` WHERE `id` = :idFaction AND `idAuthor`= :idUser;";
        $param = [['prep'=>':idFaction', 'variable'=>$idFaction],
        ['prep'=>':idUser', 'variable'=>$idUser->idUser($_SESSION)]];
        $check = ActionDB::select($select, $param, 1);
        return $check[0]['nbrFaction'];
    }
}
