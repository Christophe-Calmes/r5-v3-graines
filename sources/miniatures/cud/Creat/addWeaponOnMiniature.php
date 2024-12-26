<?php
// encodeRoutage(104)

require ('../sources/weapons/objects/SQLWeapons.php');
require ('../sources/miniatures/objets/sqlMiniatures.php');
$miniatureTraitement = new sqlMiniatures ();
$checkWeapon = new SQLWeapons ();
$arrayKeys = ['idWeapon','idMiniature'];
$controle_POST = array();
$mark = array();

if(checkPostFields ($arrayKeys, $_POST)) {
    array_push($controle_POST, $miniatureTraitement->checkMiniatureOwner(filter($_POST[$arrayKeys[1]])));
    array_push($mark, 1);
    array_push($controle_POST, $checkWeapon->checkWeaponExist ($_POST[$arrayKeys[0]]));
    array_push($mark, 1);
}
if($controle_POST == $mark) {
    $parametre = new Preparation ();
    $param = $parametre->creationPrep ($_POST);
   if($miniatureTraitement->addWeaponOnMiniature ($param)) {
    return header('location:../index.php?idNav='.$idNav.'&message=Weapon Affected sucess !&idMiniature='.filter($_POST[$arrayKeys[1]]));
   } else {
    return header('location:../index.php?idNav='.$idNav.'&message=Weapon allready affected !&idMiniature='.filter($_POST[$arrayKeys[1]]));
   }
    
} else {
    return header('location:../index.php?idNav='.$idNav.'&message=Weapon affected fail !&idMiniature='.filter($_POST[$arrayKeys[1]]));
}