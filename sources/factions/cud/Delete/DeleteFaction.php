<?php
// encodeRoutage(70)
require ('../sources/factions/objets/CUDFactions.php');
$deleteFactionObject = new CUDFactions ();
$controles_POST = array();
$arrayKey = ['id'];
if(checkPostFields ($arrayKey, $_POST)) {
    array_push($controles_POST, $checkId->controleIntegerPK(filter($_POST[$arrayKey[0]])));
}
print_r($controles_POST);
if ($controles_POST == [1]) {
    $parametre = new Preparation ();
    $param = $parametre->creationPrepIdUser ($_POST);
    $deleteFactionObject->deleteOneFactionByUser ($param);
    header('location:../index.php?message=Faction success to delete&idNav='.$idNav);
} else {
    header('location:../index.php?message=Faction fail to delete&idNav='.$idNav);
}