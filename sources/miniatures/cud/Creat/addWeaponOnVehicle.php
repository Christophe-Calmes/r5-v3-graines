<?php
// encodeRoutage(116)

require ('../sources/weapons/objects/SQLWeapons.php');
require ('../sources/vehicles/objets/SQLvehicles.php');
$vehicleTraitement = new SQLvehicles  ();
$checkWeapon = new SQLWeapons ();
$arrayKeys = ['idWeapon','idVehicle'];
$controle_POST = array();
$mark = [1];

if(checkPostFields ($arrayKeys, $_POST)) {
    array_push($controle_POST,$vehicleTraitement->checkVehicleOwner (filter($_POST[$arrayKeys[1]])));
    array_push($controle_POST, $checkWeapon->checkWeaponExist (filter($_POST[$arrayKeys[0]])));
    array_push($mark, 1);
}
if($controle_POST == $mark) {
    $parametre = new Preparation ();
    $param = $parametre->creationPrep ($_POST);
    $weaponPrice = $checkWeapon->getPriceWeapon (filter($_POST[$arrayKeys[0]]));
    $vehicleTraitement->addWeaponOnVehicle ($param, $weaponPrice);
    return header('location:../index.php?idNav='.$idNav.'&message=Weapon Affected sucess !&idVehicle='.filter($_POST[$arrayKeys[1]]));
} else {
    return header('location:../index.php?idNav='.$idNav.'&message=Weapon affected fail !&idVehicle='.filter($_POST[$arrayKeys[1]]));
}