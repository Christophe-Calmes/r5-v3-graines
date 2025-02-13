<?php
class SQLArmyList 
{
    protected $yes;
    public function __construct () {
        $this->yes = [['id'=>1, 'name'=> 'Non'], ['id'=>2, 'name'=>'Oui']];
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
        $select = "SELECT COUNT(`idVehicle`) AS `nbrVehicles` 
        FROM `armyListLinkVehicle` WHERE `idArmyList` = :idArmyList;";
        $param = [['prep'=>':idArmyList', 'variable'=>$idList]];
        return ActionDB::select($select, $param, 1)[0]['nbrVehicles'];
    }
    protected function numbreOfMiniature ($idList) {
        $select = "SELECT COUNT(`idminiature`) AS `nbreOfMiniature` 
                    FROM `armyListLinkMiniature` 
                    WHERE `idArmyList` = :idArmyList;";
         $param = [['prep'=>':idArmyList', 'variable'=>$idList]];
         return ActionDB::select($select, $param, 1)[0]['nbreOfMiniature'];            
    }
    protected function listPrice ($idList) {
        $srPrice = $this->collectPriceRSList ($idList);
        $miniaturesPrice = $this->collectPriceMiniatureList ($idList);
        $vehiclePrice = $this->collectPriceVehicleList ($idList) ;
        return ($miniaturesPrice + $vehiclePrice) * ($srPrice + 1);
    }
}
