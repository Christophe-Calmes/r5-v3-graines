<?php
// encodeRoutage(124)
require('../sources/armyList/objets/sqlArmyList.php');
require('../sources/miniatures/objets/sqlMiniatures.php');
$checkMiniature = new sqlMiniatures ();
$deleteMiniatureArmyList = new SQLArmyList ();
$arrayKeys = ['idMiniature', 'idList', 'idJoinMiniatureArmyList'];
$controle_POST = array();
$mark = [1];
if(checkPostFields ($arrayKeys, $_POST)) {
    array_push($controle_POST, $checkMiniature ->checkMiniatureOwner(filter($_POST[$arrayKeys[0]])));
    array_push($controle_POST, $deleteMiniatureArmyList->armyListOwner(filter($_POST[$arrayKeys[1]])));
    array_push($mark, 1);
}
if ($mark == $controle_POST) {
    $deleteMiniatureArmyList->deleteMiniatureGroupe (filter($_POST[$arrayKeys[2]]));

 return header('location:../index.php?idNav='.$idNav.'&message=Delete group success !&idArmyList='.filter($_POST[$arrayKeys[1]]));
} else {
    return header('location:../index.php?idNav='.$idNav.'&message=Error !&idArmyList='.filter($_POST[$arrayKeys[1]]));
}