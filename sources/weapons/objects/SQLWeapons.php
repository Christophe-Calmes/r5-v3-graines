<?php
class SQLWeapons 
{
    protected $weaponTypes;
    protected $gabaritTypes;
    protected $powerType;
    protected $yes;
    protected $blastDice;
    protected $PowerBlastDice;
    public function __construct () {
        $this->weaponTypes = ['Contact', 'Shoot', 'Explosive'];
        $this->gabaritType = ['small', 'medium', 'big', 'Blast'];
        $this->powerType = ['1D', '2D', '3D', '4D', '5D', '6D'];
        $this->blastDice = ['D4', 'D6', 'D8', 'D10', 'D12'];
        $this->PowerBlastDice = [1, 2, 3, 4, 5, 6];
        $this->yes = ['No', 'Yes'];
    }
    public function checkFactionCreatNewWeaponByUser ($idFaction) {
        $select = "SELECT COUNT(`id`) AS `numberOfFaction` 
        FROM `factions` 
        WHERE `id` = :idFaction;";
        $param = [['prep'=>':idFaction', 'variable'=>$idFaction]];
        $nbrFaction = ActionDB::select($select, $param, 1);
        if($nbrFaction[0]['numberOfFaction'] != 1) {
            return false;
        }
        return true;
    }
    public function recordFactionOfWeapon ($idUser, $idFaction) {
        $select = "SELECT `id` FROM `weapons` WHERE `idAuthor`= :idAuthor ORDER BY `id` DESC LIMIT 1;";
        $param = [['prep'=>':idAuthor', 'variable'=>$idUser]];
        $idWeapon = ActionDB::select($select, $param, 1);
        $param = [['prep'=>':idFaction', 'variable'=>$idFaction],
                  ['prep'=>':idWeapon', 'variable'=>$idWeapon[0]['id']]];
        $insert = "INSERT INTO `factionsLinkWeapon`(`idWeapon`, `idFaction`) 
        VALUES (:idWeapon, :idFaction);";
        actionDB::access($insert, $param, 1);    
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
    public function checkWeaponOwner ($idWeapon) {
        $data['idWeapon'] = $idWeapon;
        $parametre = new Preparation ();
        $param = $parametre->creationPrepIdUser ($data);
        $select = "SELECT COUNT(`id`) AS `numberOfWeapon` 
                    FROM `weapons` 
                    WHERE `id` = :idWeapon 
                    AND `idAuthor` = :idUser 
                    AND `valid` = 1;";
        $check = ActionDB::select($select, $param, 1);
        return $check[0]['numberOfWeapon'];
    }
    public function recordWeapon ($param) {
        $insert = "INSERT INTO `weapons`(`nameWeapon`, `idAuthor`,  `power`, `overPower`, `typeWeapon`, `heavy`, `spell`, `price`) 
        VALUES (:nameWeapon, :idUser,  :power, :overPower, :typeWeapon, :heavy, :spell, :price);";
        return ActionDB::access($insert, $param, 1);
    }
    public function updateCloseWeapon ($param) {
        $update = "UPDATE `weapons` SET 
                    `nameWeapon`=:nameWeapon,
                    `power`=:power,
                    `overPower`=:overPower,
                    `heavy`=:heavy,
                    `spell`=:spell,
                    `price`=:price 
                    WHERE `id` = :idWeapon;";
           return ActionDB::access($update, $param, 1);           
    }
    public function updateShootingWeapon ($param) {
        $update = "UPDATE `weapons` SET 
        `nameWeapon`= :nameWeapon,
        `power`=:power,
        `overPower`=:overPower,
        `heavy`=:heavy,
        `assault`=:assault,
        `saturation`=:saturation,
        `rateOfFire`=:rateOfFire,
        `rangeWeapon`=:rangeWeapon,
        `spell`=:spell,
        `price`=:price 
        WHERE `id` = :idWeapon";
        return ActionDB::access($update, $param, 1);          
    }
    public function updateExplosiveWeapon ($param) {
        $update = "UPDATE `weapons` SET 
        `nameWeapon`= :nameWeapon,
        `power`=:power,
        `overPower`=:overPower,
        `heavy`=:heavy,
        `assault`=:assault,
        `saturation`=:saturation,
        `rateOfFire`=:rateOfFire,
        `templateType`=:templateType,
        `rangeWeapon`=:rangeWeapon,
        `blastDice`=:blastDice,
        `spell`=:spell,
        `price`=:price 
        WHERE `id` = :idWeapon;";
        return ActionDB::access($update, $param, 1);     
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
    public function numberWeaponNoFixe ($fix) {
        $select = "SELECT COUNT(`id`) AS `nbrWeaponNoFixe` 
        FROM `weapons` WHERE `valid` = 1 AND `fixe` = :fixe;";
        $param = [['prep'=>':fixe', 'variable'=>$fix]];
        $data = ActionDB::select($select, $param, 1);
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
            $newPriceWeapon = $priceWeapon + $priceSR;
        } 
        if($add == '-') {
            $newPriceWeapon = $priceWeapon - $priceSR;
        } 
        $update = "UPDATE `weapons` SET `price`= :newPrice WHERE `id` = :idWeapon;";
        array_push($paramWeapon,['prep'=>':newPrice', 'variable'=>$newPriceWeapon ]);
        ActionDB::access($update, $paramWeapon, 1);
    }
    public function deleteWeaponByAdmin ($param) {
        $delete = "DELETE FROM `weapons` WHERE `id` = :idWeapon;";
        ActionDB::access($delete, $param, 1);
    }
    public function deleteWeaponByOwner ($param) {
        $select = "SELECT `idFaction` FROM `factionsLinkWeapon` WHERE `idWeapon` = {$param[0]['variable']};";
        $idFaction = ActionDB::select($select, [], 1);
        $delete = "DELETE FROM `weapons` WHERE `id` =:idWeapon AND `idAuthor`= :idUser;";
        ActionDB::access($delete, $param, 1);
        return $idFaction[0]['idFaction'];
    }
    public function fixOrNoFixWeaponByAdmin ($param) {
        $update = "UPDATE `weapons` SET `fixe`= `fixe` ^1 WHERE `id`= :idWeapon;";
        ActionDB::access($update, $param, 1);
    }
    public function factionOfOneWeapon ($idWeapon) {
        $select = "SELECT `idFaction` FROM `factionsLinkWeapon` WHERE `idWeapon` = :idWeapon;";
        $param = [['prep'=>':idWeapon', 'variable'=>$idWeapon]];
        $idFaction = ActionDB::select($select, $param, 1);
        return $idFaction[0]['idFaction'];
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
    protected function getAllWeaponOfFaction ($idFaction) {
        $select = "SELECT `id` AS `idWeapon`, `nameWeapon`, `power`, `overPower`, `typeWeapon`, `fixe`, `price`
            FROM `factionsLinkWeapon` 
            INNER JOIN `weapons` ON `weapons`.`id` = `idWeapon` 
            WHERE `idFaction` = :idFaction AND valid = 1;";
           $param = [['prep'=>':idFaction', 'variable'=>$idFaction]];
           return ActionDB::select($select, $param, 1);
    }
    protected function getOneWeaponByOwner ($idWeapon) {
        $select = "SELECT `weapons`.`id` AS `idW`, `nameWeapon`,  `power`, `overPower`, `typeWeapon`, `heavy`, `assault`, `saturation`, `rateOfFire`, `templateType`, `rangeWeapon`, `blastDice`, `spell`, `price`, `weapons`.`valid` AS `validWeapon`, `fixe`, `idFaction`, `nomFaction`, `nameUnivers`
                    FROM `weapons`
                    INNER JOIN `factionsLinkWeapon` ON `factionsLinkWeapon`.`idWeapon` = `weapons`.`id`
                    INNER JOIN `factions` ON `factions`.`id` = `factionsLinkWeapon`.`idFaction`
                    INNER JOIN `univers` ON  `univers`.`id` = `factions`.`idUnivers`
                    WHERE  `weapons`.`id`=:idWeapon AND  `weapons`.`valid` = 1;";
                $param = [['prep'=>':idWeapon', 'variable'=>$idWeapon]];
                return ActionDB::select($select, $param, 1);
    }
}
