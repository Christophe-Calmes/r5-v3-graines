<?php
// encodeRoutage(81)
require('../sources/weapons/objects/SQLWeapons.php');
$fixWeapon = new SQLWeapons ();
$arrayKeys = ['idWeapon'];
if(checkPostFields ($arrayKeys, $_POST)) {
    $parametre = new Preparation ();
    $param = $parametre->creationPrep ($_POST);
    $fixWeapon->fixOrNoFixWeaponByAdmin ($param);
    header('location:../index.php?message=Fix weapon success&idNav='.$idNav);
} else {
    header('location:../index.php?message=Fix weapon fail to record&idNav='.$idNav);
}