<?php
// encodeRoutage(95)
require('../sources/weapons/objects/SQLWeapons.php');
$fixWeapon = new SQLWeapons ();
$arrayKeys = ['idWeapon'];
$controle_POST = array();
$mark  =  [1];
if(checkPostFields ($arrayKeys, $_POST)) {
    array_push($controle_POST, $fixWeapon->checkWeaponOwner (filter($_POST[$arrayKeys[0]])));
}
if($mark == $controle_POST) {
    $parametre = new Preparation ();
    $param = $parametre->creationPrep ($_POST);
    $isAffected = $fixWeapon->fixOrNoFixWeaponByAdmin ($param);
    $idFaction = $fixWeapon->factionOfOneWeapon (filter($_POST[$arrayKeys[0]]));
    print_r($isAffected);
    if($isAffected) {
        header('location:../index.php?message=Fix weapon success&idNav='.$idNav.'&idWeapon='.filter($_POST['idWeapon']));
    } else {
        header('location:../index.php?message=Weapon is already affected&idNav='.$idNav.'&idWeapon='.filter($_POST['idWeapon']));
    }
} else {
    header('location:../index.php?message=Fix weapon fail to record&idNav='.$idNav);
}