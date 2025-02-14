<?php
class SQLArmyList 
{
    protected $yes;
    public function __construct () {
        $this->yes = [['id'=>1, 'name'=> 'Non'], ['id'=>2, 'name'=>'Oui']];
    }
    private function getIdUser () {
        $checkIdUser = new Controles ();
        return $checkIdUser->idUser($_SESSION);
    }
    public function checkYes ($id) {
        $index = array_search($id, array_column($this->yes, 'id'));
        if($index !== false) {
            return true;
        } 
        return false;
    }
    public function insertNewArmyList ($param) {
        $insert = "INSERT INTO `armyList`(`nameArmyList`, `idAuthor`, `idFaction`, `skirmich`) 
        VALUES (:nameArmyList, :idUser, :idFaction, :skirmich);";
        ActionDB::access($insert, $param, 1);
    }
    protected function getArmyListOfOneFaction ($idFaction) {
        $select = "SELECT `id`, `nameArmyList`, `idAuthor`, `idFaction`, `skirmich`, `valid` 
                    FROM `armyList` 
                    WHERE `idFaction` = :idFaction;";
        $param = [['prep'=>':idFaction', 'variable'=>$idFaction]];
        return ActionDB::select($select, $param, 1);
    }
    protected function getOneArmyList ($idArmyList) {
        $select = "SELECT `id`, `nameArmyList`, `idAuthor`, `idFaction`, `skirmich`, `valid` 
                    FROM `armyList` WHERE `id` = :idArmyList;";
        $param = [['prep'=>':idArmyList', 'variable'=>$idArmyList]];
        return ActionDB::select($select, $param, 1);
    }
    private function collectPriceMiniatureList ($idList) {
        $select = "SELECT SUM(`price`) AS `totalMiniaturePrice`
                    FROM `armyListLinkMiniature`
                    INNER JOIN `miniatures` ON `idminiature` = `id`
                    WHERE `idArmyList` = :idArmyList AND `stick` = 2;";
        $param = [['prep'=>':idArmyList', 'variable'=>$idList]];
        $price = ActionDB::select($select, $param, 1);
        return $price[0]['totalMiniaturePrice'];
    }
    private function collectPriceVehicleList ($idList) {
        $select = "SELECT SUM(`price`) AS `totalVehiclePrice`
            FROM `armyListLinkVehicle`
            INNER JOIN `vehicle` ON `idVehicle` = `id`
            WHERE `idArmyList` = :idArmyList AND `fix` = 3;";
        $param = [['prep'=>':idArmyList', 'variable'=>$idList]];
        $price = ActionDB::select($select, $param, 1);
        return $price[0]['totalVehiclePrice'];
    }
    private function collectPriceRSList ($idList) {
        $select = "SELECT SUM(`price`) AS `totalRSPrice` FROM `armyListLinkSpecialRules`
                    INNER JOIN `specialRules` ON `idSpecialRules` = `id`
                    WHERE `idArmyList` = :idArmyList;";
        $param = [['prep'=>':idArmyList', 'variable'=>$idList]];
        $price = ActionDB::select($select, $param, 1);         
        return $price[0]['totalRSPrice'];
    }
    protected function numbreOfVehicle ($idList) {
        $select = "SELECT SUM(`nbr`) AS `nbrVehicles` 
        FROM `armyListLinkVehicle` WHERE `idArmyList` = :idArmyList;";
        $param = [['prep'=>':idArmyList', 'variable'=>$idList]];
        return ActionDB::select($select, $param, 1)[0]['nbrVehicles'];
    }
    protected function numbreOfMiniature ($idList) {
        $select = "SELECT SUM(`nbr`) AS `nbreOfMiniature` 
                    FROM `armyListLinkMiniature` 
                    WHERE `idArmyList` = :idArmyList;";
         $param = [['prep'=>':idArmyList', 'variable'=>$idList]];
         return ActionDB::select($select, $param, 1)[0]['nbreOfMiniature'];            
    }
    protected function listPrice ($idList) {
        $srPrice = $this->collectPriceRSList ($idList);
        $miniaturesPrice = $this->collectPriceMiniatureList ($idList);
        $vehiclePrice = $this->collectPriceVehicleList ($idList) ;
        return round(($miniaturesPrice + $vehiclePrice) * ($srPrice + 1),0);
    }
    public function armyListOwner ($idArmyLlist) {
        $select = "SELECT COUNT(`id`) AS `nbrArmyList` 
                    FROM `armyList` 
                    WHERE `id` = :idArmyList AND `idAuthor` = :idUser;";
        $param = [['prep'=>':idArmyList', 'variable'=>$idArmyLlist], ['prep'=>':idUser', 'variable'=>$this->getIdUser ()]];
        return ActionDB::select($select, $param, 1)[0]['nbrArmyList'];
    }
    public function getNameOfFactionArmyList ($idArmyLlist) {
        $select = "SELECT  `nomFaction`, `idFaction`
                    FROM `armyList`
                    INNER JOIN `factions` ON `factions`.`id` = `idFaction`
                    WHERE `armyList`.`id` = :idArmyList";
        $param = [['prep'=>':idArmyList', 'variable'=>$idArmyLlist]];
        return ActionDB::select($select, $param, 1)[0];
    }
    public function getNameArmyList ($idArmyLlist) {
        $select = "SELECT  `nameArmyList` FROM `armyList` WHERE `id` = :idArmyList;";
        $param = [['prep'=>':idArmyList', 'variable'=>$idArmyLlist]];
        return ActionDB::select($select, $param, 1)[0]['nameArmyList'];
    }
    public function getSkirmichArmyList ($idArmyLlist) {
        $select = "SELECT `skirmich` FROM `armyList` WHERE `id` = :idArmyList;";
        $param = [['prep'=>':idArmyList', 'variable'=>$idArmyLlist]];
        return ActionDB::select($select, $param, 1)[0]['skirmich'];
    }
    public function insertMiniature ($param) {
        $insert = "INSERT INTO `armyListLinkMiniature`(`idminiature`, `idArmyList`, `nbr`) 
        VALUES (:idMiniature, :idArmyList, :nbr);";
        return ActionDB::access($insert, $param, 1);
    }
    public function insertVehicle ($param) {
        $insert = "INSERT INTO `armyListLinkVehicle`(`idVehicle`, `idArmyList`, `nbr`) 
        VALUES (:idVehicle, :idArmyList, :nbr);";
        return ActionDB::access($insert, $param, 1);
    }

    
}
