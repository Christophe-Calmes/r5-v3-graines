<?php
// encodeRoutage(87)
require('../sources/specialRules/objects/SQLspecialRules.php');
require('../sources/weapons/objects/SQLWeapons.php');
$UnassignSpecialRule = new SQLspecialRules ();
$weaponCheck = new SQLWeapons ();
$arrayKeys = ['idWeapon', 'idSpecialRules'];
$controle_POST = array();
$mark  =  [1];
if(checkPostFields ($arrayKeys, $_POST))  {
    array_push($controle_POST, $UnassignSpecialRule->checkSRexist (filter($_POST[$arrayKeys[1]])));
    array_push($controle_POST, $weaponCheck->checkWeaponExist (filter($_POST[$arrayKeys[0]])));
    array_push($mark, 1);
    array_push($controle_POST, $weaponCheck->checkWeaponOwner (filter($_POST[$arrayKeys[0]])));
    array_push($mark, 1);
}
if($controle_POST == $mark) {
    $parametre = new Preparation ();
    $param = $parametre->creationPrep ($_POST);
    print_r($param);
    $UnassignSpecialRule ->unassignSRWeapon ($param);
    $weaponCheck ->updateWeaponPriceSR ($param, '-');
    header('location:../index.php?message=New special rules  success to unassgin &idNav='.$idNav.'&idWeapon='.filter($_POST[$arrayKeys[0]])); 
} else {
    header('location:../index.php?message=New special rules  fail to unassgin &idNav='.$idNav.'&idWeapon='.filter($_POST[$arrayKeys[0]])); 
}