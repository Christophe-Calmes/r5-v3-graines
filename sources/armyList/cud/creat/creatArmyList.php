<?php
// encodeRoutage(121)
require('../sources/armyList/objets/sqlArmyList.php');
require('../sources/factions/objets/CUDFactions.php');
$checkFaction = new CUDFactions ();
$creatArmyList = new SQLArmyList ();
$arrayKeys = ['nameArmyList','idFaction','skirmich' ];
$controle_POST = array();
$mark = array();
if(checkPostFields($arrayKeys, $_POST)){
    array_push($controle_POST, sizePost(filter($_POST[$arrayKeys[0]]), 60));
    array_push($mark, 0);
    array_push($controle_POST, $checkFaction->factionOwner (filter($_POST[$arrayKeys[1]])));
    array_push($mark, 1);
    array_push($controle_POST, $creatArmyList->checkYes (filter($_POST[$arrayKeys[2]])));
    array_push($mark, 1);
}
if($mark == $controle_POST) {
    $parametre = new Preparation ();
    $param = $parametre->creationPrepIdUser ($_POST);
    $creatArmyList->insertNewArmyList ($param);
    header('location:../index.php?message=Army list success to record&idNav='.$idNav);
} else {
    header('location:../index.php?message=Fail record new army list');
}