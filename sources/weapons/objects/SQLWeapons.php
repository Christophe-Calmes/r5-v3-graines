<?php
class SQLWeapons 
{
    protected $weaponTypes;
    protected $gabaritTypes;
    protected $powerType;
    protected $yes;
    protected $blastDice;
    public function __construct () {
        $this->weaponTypes = ['Contact', 'Shoot', 'Explosive'];
        $this->gabaritType = ['small', 'medium', 'big', 'Blast'];
        $this->powerType = ['1D', '2D', '3D', '4D', '5D', '6D'];
        $this->blastDice = ['D4', 'D6', 'D8', 'D10', 'D12'];
        $this->yes = ['No', 'Yes'];
    }
    public function checkTypePower ($indexTypePower) {
        return array_key_exists($indexTypePower, $this->powerType);
    }
    public function checkGabaritType ($indexGabaritType) {
        return array_key_exists($indexGabaritType, $this->gabaritType);
    }
    public function checkBlastDice ($indexBlastDice) {
        return array_key_exists($indexBlastDice, $this->blastDice);
    }
    public function checkRateOfFire ($rtf) {
        if(($rtf >= 1)&&($rtf <= 12)) {
            return true;
        }
        return false;
    }
    public function checkRangeWeapon ($range) {
        if(($range >= 0)&&($range <= 120)) {
            return true;
        } 
        return false;
    }
    public function checkWeaponExist ($idWeapon) {
        $select = "SELECT COUNT(`id`) AS `numberOfWeapon` 
        FROM `weapons` WHERE `id` = :idWeapon;";
         $param = [['prep'=>':idWeapon', 'variable'=>$idWeapon]];
        $data = ActionDB::select($select, $param, 1);
        if($data[0]['numberOfWeapon'] == 1) {
            return true;
        }
        return false;
    }
    public function recordWeapon ($param) {
        $insert = "INSERT INTO `weapons`(`nameWeapon`, `idAuthor`,  `power`, `overPower`, `typeWeapon`, `heavy`, `spell`, `price`) 
        VALUES (:nameWeapon, :idUser,  :power, :overPower, :typeWeapon, :heavy, :spell, :price);";
        return ActionDB::access($insert, $param, 1);
    }
    public function recordWeaponShooting ($param) {
        $insert = "INSERT INTO `weapons`( `nameWeapon`, `idAuthor`, `power`, `overPower`, `typeWeapon`, `heavy`, `assault`, `saturation`, `rateOfFire`,  `rangeWeapon`, `spell`, `price`) 
        VALUES ( :nameWeapon, :idUser, :power, :overPower, :typeWeapon, :heavy, :assault, :saturation, :rateOfFire,  :rangeWeapon, :spell, :price);";
        return ActionDB::access($insert, $param, 1);
    }
    public function recordWeaponBlast ($param) {
        $insert = "INSERT INTO `weapons`( `nameWeapon`, `idAuthor`, `power`, `overPower`, `typeWeapon`, `heavy`, `assault`, `saturation`, `rateOfFire`,  `rangeWeapon`, `spell`, `templateType`, `blastDice`, `price`) 
        VALUES ( :nameWeapon, :idUser, :power, :overPower, :typeWeapon, :heavy, :assault, :saturation, :rateOfFire,  :rangeWeapon, :spell, :templateType, :blastDice, :price);";
        return ActionDB::access($insert, $param, 1);
    }
    public function numberWeaponNoFixe () {
        $select = "SELECT COUNT(`id`) AS `nbrWeaponNoFixe` 
        FROM `weapons` WHERE `valid` = 1 AND `fixe` = 0;";
        $data = ActionDB::select($select, [], 1);
        return $data[0]['nbrWeaponNoFixe'];
    }
    public function updateWeaponPriceSR ($param, $add) {
        $paramWeapon = [$param[0]];
        $paramSR = [$param[1]];
        $selectWeaponPrice = "SELECT `price` FROM `weapons` WHERE `id` = :idWeapon;";
        $price = ActionDB::select($selectWeaponPrice, $paramWeapon, 1);
        $priceWeapon = floatval($price[0]['price']);
        $selectSRPrice = "SELECT `price` FROM `specialRules` WHERE `id` =  :idSpecialRules;";
        $price = ActionDB::select($selectSRPrice,  $paramSR, 1);
        $priceSR = floatval($price[0]['price']);
        $newPriceWeapon = null;
        if($add == '+') {
            $newPriceWeapon = $priceWeapon * $priceSR;
        } 
        if($add == '-') {
            $newPriceWeapon = $priceWeapon / $priceSR;
        } 
        $update = "UPDATE `weapons` SET `price`= :newPrice WHERE `id` = :idWeapon;";
        array_push($paramWeapon,['prep'=>':newPrice', 'variable'=>$newPriceWeapon ]);
        ActionDB::access($update, $paramWeapon, 1);
    }
    public function deleteWeaponByAdmin ($param) {
        $delete = "DELETE FROM `weapons` WHERE `id` = :idWeapon;";
        ActionDB::access($delete, $param, 1);
    }
    public function getSpecialRuleOfOneWeapon ($idWeapon) {
        $select = "SELECT `id`, `typeSpecialRules`, `nameSpecialRules`, `descriptionSpecialRules`, `price`, `valid`  
        FROM `specialeRulesLinkWeapon`
        INNER JOIN `specialRules` ON  `specialeRulesLinkWeapon`.`idSpecialRules` = `specialRules`.`id`
        WHERE `idWeapon` = :idWeapon
        ORDER BY `nameSpecialRules`;";
        $param = [['prep'=>':idWeapon', 'variable'=>$idWeapon]];
        return ActionDB::select($select, $param, 1);
    }

    protected function getWeapon ($firstPage, $WeaponByPage, $fixe) {
        $select = "SELECT `id`, `nameWeapon`, `idAuthor`, `nt`, `power`, `overPower`, `typeWeapon`, `heavy`, `assault`, `saturation`, `rateOfFire`, `templateType`, `rangeWeapon`, `blastDice`, `spell`, `price`, `valid`, `fixe` 
        FROM `weapons` 
        WHERE `fixe` = :fixe
        ORDER BY `typeWeapon`, `nameWeapon`
        LIMIT {$firstPage}, {$WeaponByPage};";
        $param = [['prep'=>':fixe', 'variable'=>$fixe]];
        return ActionDB::select($select, $param, 1);
    }
    protected function getOneWeaponAdmin ($idWeapon) {
        $select = "SELECT `id`, `nameWeapon`, `idAuthor`, `nt`, `power`, `overPower`, `typeWeapon`, `heavy`, `assault`, 
        `saturation`, `rateOfFire`, `templateType`, `rangeWeapon`, `blastDice`, 
        `spell`, `price`, `valid`, `fixe`, `login`
        FROM `weapons`
        INNER JOIN `xgyd0647_techr5`.`users` ON `xgyd0647_techr5`.`users`.`idUser` = `xgyd0647_r5business`.`weapons`.`idAuthor`
        WHERE `id` = :idWeapon;";
        $param = [['prep'=>':idWeapon', 'variable'=>$idWeapon]];
        $data =  ActionDB::select($select, $param, 1);
        return $data[0];
    }
}
