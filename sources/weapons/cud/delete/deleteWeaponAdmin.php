<?php
// encodeRoutage(80)
require('../sources/weapons/objects/SQLWeapons.php');
$deleteWeapon = new SQLWeapons ();
$arrayKeys = ['idWeapon'];
if(checkPostFields ($arrayKeys, $_POST)) {
    $parametre = new Preparation ();
    $param = $parametre->creationPrep ($_POST);
    $deleteWeapon->deleteWeaponByAdmin ($param);
    header('location:../index.php?message=Delete weapon success&idNav='.$idNav);
} else {
    header('location:../index.php?message=Delete weapon fail to record&idNav='.$idNav);
}