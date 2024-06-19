<?php
// encodeRoutage(69)
require ('../sources/factions/objets/CUDFactions.php');
$cudAFaction = new CUDFactions ();
$arrayKeys = ['nomFaction', 'idUnivers'];
$controle_POST = array();
if(checkPostFields ($arrayKeys, $_POST)) {
    array_push($controle_POST, $cudAFaction->checkNbrFactionForOneUnivers (filter($_POST[$arrayKeys[1]])));
    array_push($controle_POST, sizePost(filter($_POST[$arrayKeys[0]]), 60));
    array_push($controle_POST, $checkId->controleIntegerPK(filter($_POST[$arrayKeys[1]])));
}

if($controle_POST == [1, 0, 1]) {
    $parametre = new Preparation ();
    $param = $parametre->creationPrepIdUser ($_POST);
    $cudAFaction->recordNewFaction ($param);
    header('location:../index.php?message=New faction success to record&idNav='.$idNav);
} else {
    header('location:../index.php?message=New faction fail to record&idNav='.$idNav);
}