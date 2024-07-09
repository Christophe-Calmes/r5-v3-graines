<?php
// encodeRoutage(85)
require('../sources/weapons/objects/SQLWeapons.php');
$deleteWeapon = new SQLWeapons ();
$arrayKeys = ['idWeapon'];
if(checkPostFields ($arrayKeys, $_POST)) {
    $parametre = new Preparation ();
    $param = $parametre->creationPrepIdUser ($_POST);
    $idFaction = $deleteWeapon->deleteWeaponByOwner ($param);
    header('location:../index.php?message=Delete weapon success&idNav='.$idNav.'&idFaction='.$idFaction);
} else {
    header('location:../index.php?message=Delete weapon fail to record');
}