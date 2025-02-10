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
        $this->gabaritType = ['1"(BA)', '2"(BA)', '3"(BA / GW)', 'Blast(GW)', '4"(BA)', '5"(GW)'];
        $this->powerType = ['1D', '2D', '3D', '4D', '5D', '6D'];
        $this->blastDice = ['D4', 'D6', 'D8', 'D10', 'D12'];
        $this->PowerBlastDice = [1, 2, 3, 4, 5, 6];
        $this->yes = ['No', 'Yes'];
    }
    protected function rateOfFire ($rateOfFire) {
        if ($rateOfFire == 0) {
            return 'No fire';
        }
        if ($rateOfFire == 1)  {
            return ' - ';
        } else {
            return $rateOfFire. ' / round';
        }
    }
    protected function getWeaponOfOneVehiclePrintDataSheet ($idVehicle) {
        $select = "SELECT `id`, `nameWeapon`, `idAuthor`, `nt`, `power`, `overPower`, `typeWeapon`, `heavy`, `assault`, `saturation`, `rateOfFire`, `templateType`, `rangeWeapon`, `blastDice`, `spell`, `price`, `valid`, `fixe`, `globalWeapon` 
                    FROM `vehicleLinkWeapon` 
                    INNER JOIN `weapons`ON `idWeapon` = `id`
                    WHERE `idVehicle` = :idVehicle;";
            $param = [['prep'=>':idVehicle', 'variable'=>$idVehicle]];
            return ActionDB::select($select, $param, 1);
    }
    protected function getWeaponOfOnVehicleUpdate ($idVehicle) {
        $select = "SELECT `idWeapon` FROM `vehicleLinkWeapon` WHERE `idVehicle` = :idVehicle;";
        $param = [['prep'=>':idVehicle', 'variable'=>$idVehicle]];
        return ActionDB::select($select, $param, 1);
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
        /* No global weapon*/
        $udpade = "UPDATE `weapons` SET `globalWeapon` = 0 WHERE `id` = :idWeapon;";
        $param = [['prep'=>':idWeapon', 'variable'=>$idWeapon[0]['id']]];
        actionDB::access($udpade, $param, 1);
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
        if(count($param) == 7) {
            $update = "UPDATE `weapons` SET 
            `nameWeapon`=:nameWeapon,
            `power`=:power,
            `overPower`=:overPower,
            `heavy`=:heavy,
            `spell`=:spell,
            `price`=:price 
            WHERE `id` = :idWeapon;";
        } else {
            $update = "UPDATE `weapons` SET 
            `nameWeapon`=:nameWeapon,
            `power`=:power,
            `overPower`=:overPower,
            `heavy`=:heavy,
            `spell`=:spell,
            `price`=:price 
            WHERE `id` = :idWeapon AND `idAuthor`=:idUser;";
        }
     
           return ActionDB::access($update, $param, 1);           
    }
    public function updateShootingWeapon ($param) {
        if(count($param) == 11) {
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
        } else {
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
            WHERE `id` = :idWeapon AND `idAuthor`=:idUser;";
        }

        return ActionDB::access($update, $param, 1);          
    }
    public function updateExplosiveWeapon ($param) {
        if(count($param) == 13) {
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
        } else {
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
            WHERE `id` = :idWeapon AND `idAuthor`=:idUser;";
        }

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
    public function numberWeaponNoFixe ($fix, $global = 0) {
        $select = "SELECT COUNT(`id`) AS `nbrWeaponNoFixe` 
        FROM `weapons` WHERE `valid` = 1 AND `fixe` = :fixe AND `globalWeapon` = :globalWeapon;";
        $param = [['prep'=>':fixe', 'variable'=>$fix],
                    ['prep'=>':globalWeapon', 'variable'=>$global]];
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
    private function WeaponAllReadyAffected ($param) {
        $select = "SELECT COUNT(`idWeapon`) AS `affected` FROM `miniatureLinkWeapons` WHERE `idWeapon` = :idWeapon;";
        $isAffected = ActionDB::select($select, $param, 1);
        if($isAffected[0]['affected'] == 0) {
            return true;
        }
        return false;
    }
    public function fixOrNoFixWeaponByAdmin ($param) {
        if($this->WeaponAllReadyAffected ($param)) {
            $update = "UPDATE `weapons` SET `fixe`= `fixe` ^1 WHERE `id`= :idWeapon;";
            ActionDB::access($update, $param, 1);
            return true;
        }
       return false;
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

    protected function getWeapon ($firstPage, $WeaponByPage, $fixe, $global = 1) {
        $select = "SELECT `id`, `nameWeapon`, `idAuthor`, `nt`, `power`, `overPower`, `typeWeapon`, `heavy`, `assault`, `saturation`, `rateOfFire`, `templateType`, `rangeWeapon`, `blastDice`, `spell`, `price`, `valid`, `fixe` 
        FROM `weapons` 
        WHERE `fixe` = :fixe AND `globalWeapon` = :globalWeapon 
        ORDER BY `typeWeapon`, `nameWeapon`
        LIMIT {$firstPage}, {$WeaponByPage};";
                $param = [['prep'=>':fixe', 'variable'=>$fixe],
                ['prep'=>':globalWeapon', 'variable'=>$global]];
        return ActionDB::select($select, $param, 1);
    }
    protected function getOneWeaponAdmin ($idWeapon) {
        $select = "SELECT `id`, `nameWeapon`, `idAuthor`, `nt`, `power`, `overPower`, `typeWeapon`, `heavy`, `assault`, 
        `saturation`, `rateOfFire`, `templateType`, `rangeWeapon`, `blastDice`, 
        `spell`, `price`, `valid`, `fixe`, `login`, `globalWeapon`
        FROM `weapons`
        INNER JOIN `xgyd0647_techr5`.`users` ON `xgyd0647_techr5`.`users`.`idUser` = `xgyd0647_r5business`.`weapons`.`idAuthor`
        WHERE `id` = :idWeapon;";
        $param = [['prep'=>':idWeapon', 'variable'=>$idWeapon]];
        $data =  ActionDB::select($select, $param, 1);
        return $data[0];
    }
    protected function getAllWeaponOfFaction ($idFaction) {
        $select = "SELECT `id` AS `idWeapon`, `nameWeapon`, `power`, `overPower`, `typeWeapon`, `fixe`, `price`, `heavy`, 
                    `assault`, `saturation`, `rateOfFire`, `templateType`, `rangeWeapon`, `blastDice`, `spell`
            FROM `factionsLinkWeapon` 
            INNER JOIN `weapons` ON `weapons`.`id` = `idWeapon` 
            WHERE `idFaction` = :idFaction AND valid = 1
            ORDER BY `typeWeapon`, `nameWeapon`, `price`;";
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
    protected function getWeaponByType ($typeWeapon) {
        $select = "SELECT `id` 
        FROM `weapons` 
        WHERE `globalWeapon` = 1 AND `valid` = 1  AND `typeWeapon` = :typeWeapon;";
        $param = [['prep'=>':typeWeapon', 'variable'=>$typeWeapon]];
        return ActionDB::select($select, $param, 1);
    }
    protected function getWeaponByTypeAndFaction ($typeWeapon, $idFaction) {
        $select = "SELECT `id`, `nameWeapon`, `idAuthor`, `nt`, `power`, `overPower`, `typeWeapon`, `heavy`, `assault`, `saturation`, `rateOfFire`, `templateType`, `rangeWeapon`, `blastDice`, `spell`, `price`, `valid`, `fixe`
                    FROM `factionsLinkWeapon`
                    INNER JOIN `weapons` ON `factionsLinkWeapon`.`idWeapon` = `weapons`.`id`
                    WHERE `factionsLinkWeapon`.`idFaction` = :idFaction AND `globalWeapon` = 0 AND `valid` = 1  AND `typeWeapon` = :typeWeapon AND `fixe` = 1;";
        $param = [['prep'=>':typeWeapon', 'variable'=>$typeWeapon],
                    ['prep'=>':idFaction', 'variable'=>$idFaction]];
        return ActionDB::select($select, $param, 1);
    }
    protected function getWeaponOfOneMiniature ($idMiniature) {
        $select = "SELECT `idWeapon` AS `id`
        FROM `miniatureLinkWeapons`
        WHERE `idminiature` = :idMiniature;";
        $param = [['prep'=>'idMiniature', 'variable'=>$idMiniature]];
        return ActionDB::select($select, $param, 1);
    }
    public function getPriceWeapon ($idWeapon) {
        $param = [['prep'=>'idWeapon', 'variable'=>$idWeapon]];
        $select = "SELECT `price` FROM `weapons` WHERE `id` = :idWeapon AND `valid` = 1 AND `fixe` = 1;";
        $price = ActionDB::select($select, $param, 1);
        return $price[0]['price'];
    }
}
