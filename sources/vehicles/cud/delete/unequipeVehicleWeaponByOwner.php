<?php
// encodeRoutage(117)
require ('../sources/vehicles/objets/SQLvehicles.php');
require ('../sources/weapons/objects/SQLWeapons.php');

$deleteVehicle = new SQLvehicles ();
$checkWeaponExist = new SQLWeapons ();
$arrayKeys = ['idWeapon', 'idVehicle'];
$controle_POST = array();
$mark  =  [1];
if(checkPostFields ($arrayKeys, $_POST)) {
    array_push($controle_POST, $deleteVehicle->checkVehicleOwner(filter($_POST[$arrayKeys[1]])));
    array_push($controle_POST, $checkWeaponExist->checkWeaponExist (filter($_POST[$arrayKeys[0]])));
    array_push($mark, 1);
}
if($controle_POST == $mark) {
    $_POST['price'] = $checkWeaponExist->getPriceWeapon (filter($_POST[$arrayKeys[0]]));
    $parametre = new Preparation ();
    $param = $parametre->creationPrep ($_POST);
    $deleteVehicle->substractWeaponVehicle ($param);
    header('location:../index.php?idNav='.$idNav.'&message=Delete weapon&idVehicle='.filter($_POST[$arrayKeys[1]]));
} else {
    header('location:../index.php?idNav='.$idNav.'&message=Delete weapon&idVehicle='.filter($_POST[$arrayKeys[1]]));
}