<?php
class PriceOfWeapon
{
    private $power;
    public function __construct () {
        $this->power = [1.10, 2.15, 3.3, 4.6, 6.2, 7.4];
    }
    private function baseWeaponPrice ($arrayWeapon) {
        /* Base */
        $price =  $this->power[$arrayWeapon[0]];
        /* overPower */
        if($arrayWeapon[1] == 1) {
            $price = $price * 1.6;
        }
        /* Spell */
        if($arrayWeapon[3] == 1) {
            $price = $price * 1.1;
        }
        /* Heavy weapon */
        if($arrayWeapon[2] == 1) {
            $price = $price + 0.3;
        }
        return $price;
    }
    public function closeWeaponPrice ($arrayWeapon) {
        return $this->baseWeaponPrice ($arrayWeapon);
    }
    public function shootingWeaponPrice ($arrayWeapon) {
        $price = $this->baseWeaponPrice ($arrayWeapon);
        /* Assault*/
        if($arrayWeapon[4] == 1) {
            $price = $price + 0.1;
        }
        /* Saturation*/
        if($arrayWeapon[5] == 1) {
            $price = $price * 1.1;
        }
        /* Rate of fire */
        $price = $price + ($arrayWeapon[6]/12); 
        /* range weapon */
        if($arrayWeapon[7] != 0) {
            $price += log($arrayWeapon[7]);
        }
        return round($price, 3);
    }
    public function blastWeaponPrice ($arrayWeapon) {
        $price = $this->shootingWeaponPrice ($arrayWeapon);
        $blastSurface = [3, 13, 28, 20];
        $blastDicePrice = [0.2, 0.4, 0.8, 1.6, 2.5];
        /* templateType & blastDice */
        $price = $price + ($arrayWeapon[8] * $arrayWeapon[9]);
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
}
