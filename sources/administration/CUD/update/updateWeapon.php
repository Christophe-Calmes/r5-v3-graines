<?php
//  encodeRoutage(137)
require('../sources/weapons/objects/SQLWeapons.php');
require('../sources/weapons/objects/PriceOfWeapon.php');
$weapon = new SQLWeapons ();
$calculatingPriceWeapon = new PriceOfWeapon ();
$idAllWeapon = $weapon->getIdAllWeapon ();
foreach ($idAllWeapon as $value) {
    $price = 0;
    $SRPrice = $calculatingPriceWeapon->getSpecialRulesPrice ($value['id']);
    switch ($value['typeWeapon']) {
        case 0:
            $price = $calculatingPriceWeapon->closeWeaponPrice ($calculatingPriceWeapon->getAllParamCloseWeapon ($value['id']))+ $SRPrice;
            break;
        case 1:
            $price = $calculatingPriceWeapon->shootingWeaponPrice($calculatingPriceWeapon->getAllParamShootWeapon ($value['id'])) + $SRPrice;
            break;
        case 2:
            $price = $calculatingPriceWeapon->blastWeaponPrice($calculatingPriceWeapon->getAllParamExplosiveWeapon ($value['id'])) + $SRPrice;
                break;
        default:
            echo 'Error';
            break;
    }
    $weapon->updatePriceByGestionnaire ($value['id'], $price);
}

header('location:../index.php?idNav='.$idNav.'&message=Weapon updated');