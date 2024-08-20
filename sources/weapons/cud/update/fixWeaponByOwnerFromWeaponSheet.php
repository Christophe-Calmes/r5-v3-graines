<?php
// encodeRoutage(95)
require('../sources/weapons/objects/SQLWeapons.php');
$fixWeapon = new SQLWeapons ();
$arrayKeys = ['idWeapon'];
$controle_POST = array();
$mark = array();
if(checkPostFields ($arrayKeys, $_POST)) {
    array_push($controle_POST, $fixWeapon->checkWeaponOwner (filter($_POST[$arrayKeys[0]])));
    array_push($mark, 1);
}
if($mark == $controle_POST) {
    $parametre = new Preparation ();
    $param = $parametre->creationPrep ($_POST);
    $fixWeapon->fixOrNoFixWeaponByAdmin ($param);
    $idFaction = $fixWeapon->factionOfOneWeapon (filter($_POST[$arrayKeys[0]]));
    header('location:../index.php?message=Fix weapon success&idNav='.$idNav.'&idWeapon='.filter($_POST['idWeapon']));
} else {
    header('location:../index.php?message=Fix weapon fail to record&idNav='.$idNav);
}