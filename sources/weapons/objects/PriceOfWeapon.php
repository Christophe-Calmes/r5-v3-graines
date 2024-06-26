<?php
class PriceOfWeapon
{
    private $power;
    public function __construct () {
        $this->power = [1.10, 1.3, 1.6, 2, 2.5, 3.1];
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
}
