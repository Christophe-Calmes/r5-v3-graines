<?php
 class SQLspecialRules
{
    protected $specialRulesType;
    protected $priceSpecialRules;
    protected $yes;
    public function __construct () {
        $this->specialRulesType = ['Weapon', 'Miniature', 'Vehicle', 'Army list'];
        $this->priceSpecialRules = [['level'=>'Neutral', 'price'=>0.05],
                                    ['level'=>'Basic', 'price'=>0.1],
                                    ['level'=>'Classic', 'price'=>0.15],
                                    ['level'=>'Advantage', 'price'=>0.2],
                                    ['level'=>'Powerfull', 'price'=>0.5],
                                    ['level'=>'Very powerfull', 'price'=>0.75],
                                    ['level'=>'Magical technology', 'price'=>1],];
        $this->yes = ['No', 'Yes'];

    }
    public function checkTypeRule ($indexTypeRule) {
        return array_key_exists($indexTypeRule, $this->specialRulesType);
    }
    public function checkPriceRule ($indexPriceRule) {
        return isset($this->priceSpecialRules[$indexPriceRule]);
    }
    public function priceTransformation ($indexPrice) {
        return $this->priceSpecialRules[$indexPrice]['price'];
    }
    public function checkYesOrNo ($index) {
        return isset($this->yes[$index]);
    }
    public function checkSRexist ($idRS) {
        $select = "SELECT COUNT(`id`) AS `nbrOfSR` FROM `specialRules` WHERE `id`=:id;";
        $param = [['prep'=>':id', 'variable'=>$idRS]];
        $data = ActionDB::select($select,$param, 1);
        if($data[0]['nbrOfSR'] == 1) {
            return true;
        }
        return false;
    }
    public function insertNewSP ($param) {
        $insert = "INSERT INTO `specialRules`(`typeSpecialRules`, `nameSpecialRules`, `descriptionSpecialRules`, `price`) 
        VALUES (:typeSpecialRules, :nameSpecialRules, :descriptionSpecialRules, :price);";
        return ActionDB::access($insert, $param, 1);
    }
    public function numberOfRS ($typeRS) {
        $select = "SELECT COUNT(`id`) AS nbrSR 
        FROM `specialRules` 
        WHERE `typeSpecialRules` = :typeSpecialRules AND `valid` = 1;";
        $param = [['prep'=>':typeSpecialRules', 'variable'=>$typeRS]];
        $data = ActionDB::select($select, $param, 1);
        return $data[0]['nbrSR'];
    }
    public function UpdateSR ($param) {
        $update = "UPDATE `specialRules` 
                    SET `typeSpecialRules`=:typeSpecialRules,
                    `nameSpecialRules`=:nameSpecialRules,
                    `descriptionSpecialRules`=:descriptionSpecialRules,
                    `price`=:price,
                    `valid`=:valid 
                    WHERE `id`= :idRS";
         return ActionDB::access($update, $param, 1);
    }
    public function DeleteSR ($param) {
        $delete = "DELETE FROM `specialRules` WHERE `id` = :idRS;";
        return ActionDB::access($delete, $param, 1);

    }
    public function assignSRWeapon ($param) {
        $insert = "INSERT INTO `specialeRulesLinkWeapon`(`idWeapon`, `idSpecialRules`) 
        VALUES (:idWeapon, :idSpecialRules);";
        return ActionDB::access($insert, $param, 1);
    }
    public function unassignSRWeapon ($param) {
        $delete = "DELETE FROM `specialeRulesLinkWeapon` 
        WHERE `idWeapon`=:idWeapon AND `idSpecialRules` =:idSpecialRules;";
        return ActionDB::access($delete, $param, 1);
    }
    public function unassignSRMiniature ($param) {
        $delete = "DELETE FROM `miniatureLinkSpecialRules` 
        WHERE `idMiniature` = :idMiniature AND `idSpecialRules`=:idSpecialRules;";
        return ActionDB::access($delete, $param, 1);
    }
    private function checkSRMiniature ($param) {
        $select = "SELECT COUNT(`idMiniature`) AS `nbrSR` FROM `miniatureLinkSpecialRules` 
        WHERE `idMiniature` = :idMiniature AND `idSpecialRules` = :idSpecialRules;";
        $checkSR = ActionDB::select($select, $param, 1);
        if($checkSR[0]['nbrSR'] > 0) {
            return false;
        }
        return true;
       }
    public function assignSRMiniature ($param) {
        if($this->checkSRMiniature ($param)) {
            $insert = "INSERT INTO `miniatureLinkSpecialRules`(`idMiniature`, `idSpecialRules`) 
            VALUES (:idMiniature,  :idSpecialRules);";
            return ActionDB::access($insert, $param, 1);
        }
        return false;
    }
    protected function getRS ($firstPage,  $RSbyPage, $typeRS) {
        $select = "SELECT `id`, `nameSpecialRules`, `price` FROM `specialRules`
        WHERE `typeSpecialRules` = :typeSpecialRules AND `valid` = 1 
        ORDER BY `nameSpecialRules` LIMIT  {$firstPage}, {$RSbyPage}"; 
        $param = [['prep'=>':typeSpecialRules', 'variable'=>$typeRS]];
        return ActionDB::select($select, $param, 1);
    }
    protected function getOneRS ($idRS) {
        $select = "SELECT `id`, `typeSpecialRules`, `nameSpecialRules`, `descriptionSpecialRules`, `price`, `valid` 
        FROM `specialRules` 
        WHERE `id` = :id;";
        $param = [['prep'=>':id', 'variable'=>$idRS]];
        return ActionDB::select($select, $param, 1);
    }
    protected function getAllRSforAffectation ($typeRS, $valid, $idWeapon) {
        $select = "SELECT `id` AS `idSpecialRule`, `typeSpecialRules`, `nameSpecialRules`, `descriptionSpecialRules`, `price`, `valid` 
        FROM `specialRules` 
        WHERE `typeSpecialRules` =  :typeSpecialRules
        AND  `valid` = :valid
        AND `id` NOT IN (SELECT`idSpecialRules` 
        FROM `specialeRulesLinkWeapon` 
        WHERE `idWeapon` = :idWeapon)
        ORDER BY `nameSpecialRules`;";
            $param = [
            ['prep' => ':typeSpecialRules', 'variable' => $typeRS],
            ['prep' => ':valid', 'variable' => $valid],
            ['prep' => ':idWeapon', 'variable' => $idWeapon]];
        $dataSpecialRules =  ActionDB::select($select, $param, 1);
        return $dataSpecialRules;
    }
    protected function getAllRSForMiniature ($idMiniature) {
        $select = "SELECT `id` AS `idSpecialRule`, `typeSpecialRules`, `nameSpecialRules`, `descriptionSpecialRules`, `price`, `valid` 
        FROM `specialRules` 
        WHERE `typeSpecialRules` =  1
        AND  `valid` = 1
        AND `id` NOT IN (SELECT`idSpecialRules` 
        FROM `miniatureLinkSpecialRules` 
        WHERE `idminiature` = :idMiniature)
        ORDER BY `nameSpecialRules`;";
        $param = [['prep'=>':idMiniature', 'variable'=>$idMiniature]];
        $dataSpecialRules = ActionDB::select($select, $param, 1);
        return $dataSpecialRules;
    }
    protected function getAssignedSpecialRuleMiniature ($idMiniature) {
        $select = "SELECT  `id` AS `idSpecialRule`, `typeSpecialRules`, `nameSpecialRules`, `descriptionSpecialRules`, `price`, `valid` 
        FROM `miniatureLinkSpecialRules`
        INNER JOIN  `specialRules` ON `specialRules`.`id` =  `miniatureLinkSpecialRules`.`idSpecialRules` 
        WHERE `idMiniature` = :idMiniature;";
        $param = [['prep' => ':idMiniature', 'variable' => $idMiniature]];
        return ActionDB::select($select, $param, 1);
    }

    protected function getAssignedSpecialRule ($idWeapon) {
        $select = "SELECT  `id` AS `idSpecialRule`, `typeSpecialRules`, `nameSpecialRules`, `descriptionSpecialRules`, `price`, `valid` 
        FROM `specialeRulesLinkWeapon` 
        INNER JOIN  `specialRules` ON `specialRules`.`id` =  `specialeRulesLinkWeapon`.`idSpecialRules` 
        WHERE `idWeapon` = :idWeapon;";
        $param = [['prep' => ':idWeapon', 'variable' => $idWeapon]];
        return ActionDB::select($select, $param, 1);
    }

}
