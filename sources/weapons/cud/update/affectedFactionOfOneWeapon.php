<?php
// encodeRoutage(128)
require ('../sources/weapons/objects/SQLWeapons.php');
$AffectedFationWeapon = new SQLWeapons ();
$arrayKeys =  ['idFaction', 'idWeapon'];
$controle_POST = array();
$mark  =  [1];
if(checkPostFields ($arrayKeys, $_POST)) {
    array_push($controle_POST, $AffectedFationWeapon->checkFactionCreatNewWeaponByUser (filter($_POST[$arrayKeys[0]])));
    array_push($controle_POST, $AffectedFationWeapon->checkWeaponOwner (filter($_POST[$arrayKeys[1]])));
    array_push($mark, 1);
}

if($controle_POST == $mark) {
   $parametre = new Preparation ();
   $param = $parametre->creationPrep($_POST);
   $AffectedFationWeapon->affectedFactionAtWeapon ($param);
   return  header('location:../index.php?message=New faction affected for weapon');
} else {
    return  header('location:../index.php?message=Error !');
}
