<?php
class PriceOfWeapon
{
    private $power;
    public function __construct () {
        $this->power = [1.10, 1.3, 1.6, 2, 2.5, 3.1];
    }
    public function closeWeaponPrice ($arrayWeapon) {
        $price =  $this->power[$arrayWeapon[0]];
        if($arrayWeapon[1] == 1) {
            $price = $price * 1.6;
        }
        if($arrayWeapon[2] == 1) {
            $price = $price * 1.1;
        }
        return $price;
    }
}
