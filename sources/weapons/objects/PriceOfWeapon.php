<?php
class PriceOfWeapon
{
    private $power;
    public function __construct () {
        $this->power = [1.10, 2.15, 3.3, 4.6, 6.2, 7.4];
    }
    private function creatParamWeapon ($arrayWeapon) {

        switch (count($arrayWeapon)) {
            case 10:
                $paramWeapon = [
                    'power'=>$arrayWeapon[0], 
                    'overPower'=>$arrayWeapon[1],
                    'heavy'=>$arrayWeapon[2], 
                    'spell'=>$arrayWeapon[3], 
                    'assault'=>$arrayWeapon[4], 
                    'saturation'=>$arrayWeapon[5], 
                    'rateOfFire'=>$arrayWeapon[6], 
                    'rangeWeapon'=>$arrayWeapon[7], 
                    'templateType'=>$arrayWeapon[8], 
                    'blastDice'=>$arrayWeapon[9]];
                break;
            case 8:
                $paramWeapon = [
                    'power'=>$arrayWeapon[0], 
                    'overPower'=>$arrayWeapon[1],
                    'heavy'=>$arrayWeapon[2], 
                    'spell'=>$arrayWeapon[3], 
                    'assault'=>$arrayWeapon[4], 
                    'saturation'=>$arrayWeapon[5], 
                    'rateOfFire'=>$arrayWeapon[6], 
                    'rangeWeapon'=>$arrayWeapon[7]];
                break;
            default:
            $paramWeapon = [
                'power'=>$arrayWeapon[0], 
                'overPower'=>$arrayWeapon[1],
                'heavy'=>$arrayWeapon[2], 
                'spell'=>$arrayWeapon[3]];
            break;
        }
        print_r($paramWeapon);
        return $paramWeapon;
     
    }
    private function baseWeaponPrice ($paramWeapon) {
        $price =  $this->power[$paramWeapon['power']];
        if($paramWeapon['overPower'] == 1) {
            $price = $price + 2.15;
        }
        if($paramWeapon['spell'] == 1) {
            $price = $price * 1.2;
        }
        if($paramWeapon['heavy']  == 1) {
            $price = $price * 1.5;
        }
        return $price;
    }
    public function closeWeaponPrice ($arrayWeapon) {
        $paramWeapon = $this->creatParamWeapon ($arrayWeapon);
        return $this->baseWeaponPrice ($paramWeapon);
    }
    public function shootingWeaponPrice ($arrayWeapon) {
        $paramWeapon = $this->creatParamWeapon ($arrayWeapon);
        $price = $this->baseWeaponPrice ($paramWeapon );
        if($paramWeapon['assault']  == 1) {
            $price = $price + 0.1;
        }
        if($paramWeapon['saturation']== 1) {
            $price = $price + 1.2;
        }
        $price = $price + ($paramWeapon['rateOfFire']/3); 
     
        if($arrayWeapon[7] != 0) {
            $price += log($paramWeapon['rangeWeapon']);
        }
        return round($price, 3);
    }
    public function blastWeaponPrice ($arrayWeapon) {
        $price = $this->shootingWeaponPrice ($arrayWeapon);
        $paramWeapon = $this->creatParamWeapon ($arrayWeapon);
        $blastSurface = [0.78, 3.14, 7.07, 10.89, 12.57, 19.63];
        ['1"(BA)', '2"(BA)', '3"(BA / GW)', 'Blast(GW)', '4"(BA)', '5"(GW)'];
        $blastDicePrice = [0.2, 0.4, 0.8, 1.6, 2.5];
        $price = $price + ($blastSurface[$paramWeapon['templateType']] * $blastDicePrice[$paramWeapon['blastDice']]);
        return $price;
    }
    public function specialRulesPrice ($idWeapon, $rawPrice) {
        $select = "SELECT SUM(`price`) AS `modWeaponPrice`
                    FROM `specialeRulesLinkWeapon`
                    INNER JOIN `specialRules` ON `idSpecialRules` = `id`
                    WHERE `idWeapon` = :idWeapon;";
        $param = [['prep'=>':idWeapon', 'variable'=>$idWeapon]];
        $dataModPrice = ActionDB::select($select, $param, 1);
        return round($dataModPrice[0]['modWeaponPrice'] + $rawPrice, 3);
    }
    public function getSpecialRulesPrice ($idWeapon) {
        $select = "SELECT SUM(`price`) AS `modWeaponPrice`
                    FROM `specialeRulesLinkWeapon`
                    INNER JOIN `specialRules` ON `idSpecialRules` = `id`
                    WHERE `idWeapon` = :idWeapon;";
        $param = [['prep'=>':idWeapon', 'variable'=>$idWeapon]];
        $dataModPrice = ActionDB::select($select, $param, 1);
        return round($dataModPrice[0]['modWeaponPrice'], 3);
    }
    public function getAllParamCloseWeapon ($idWeapon) {
        $select = "SELECT  `power`, `overPower`, `heavy`,  `spell` FROM `weapons` WHERE `id` = :idWeapon;";
        $param = [['prep'=>':idWeapon', 'variable'=>$idWeapon]];
        return array_values(ActionDB::select($select, $param, 1)[0]);

    }
    public function getAllParamShootWeapon ($idWeapon) {
        $select = "SELECT `power`, `overPower`, `heavy`, `spell`, `assault`, `saturation`, `rateOfFire`, `rangeWeapon` 
        FROM `weapons` WHERE `id` = :idWeapon;";
        $param = [['prep'=>':idWeapon', 'variable'=>$idWeapon]];
        return array_values(ActionDB::select($select, $param, 1)[0]);
    }
    public function getAllParamExplosiveWeapon ($idWeapon) {
        $select = "SELECT `power`, `overPower`, `heavy`, `spell`, `assault`, `saturation`, `rateOfFire`, `rangeWeapon`, `templateType`, `blastDice` 
        FROM `weapons` WHERE `id` = :idWeapon;";
        $param = [['prep'=>':idWeapon', 'variable'=>$idWeapon]];
        return array_values(ActionDB::select($select, $param, 1)[0]);
    }
}
