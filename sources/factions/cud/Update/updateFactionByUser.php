<?php
// encodeRoutage(71)
require ('../sources/factions/objets/CUDFactions.php');
$cudAFaction = new CUDFactions ();
$arrayKeys = ['nomFaction', 'id'];
$controle_POST = array();
if(checkPostFields ($arrayKeys, $_POST)) {
    array_push($controle_POST, sizePost(filter($_POST[$arrayKeys[0]]), 60));
    array_push($controle_POST, $checkId->controleIntegerPK(filter($_POST[$arrayKeys[1]])));
}
print_r($controle_POST);
if($controle_POST == [0, 1]) {
    $parametre = new Preparation ();
    $param = $parametre->creationPrepIdUser ($_POST);
    $cudAFaction->updateNomFactionByUser ($param);
    header('location:../index.php?message=Faction update success to record&idNav='.$idNav);
} else {
    header('location:../index.php?message=Faction update fail to record&idNav='.$idNav);
}