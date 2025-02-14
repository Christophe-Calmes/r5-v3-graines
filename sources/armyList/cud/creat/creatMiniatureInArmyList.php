<?php
//  encodeRoutage(122)
require('../sources/armyList/objets/sqlArmyList.php');
require('../sources/miniatures/objets/sqlMiniatures.php');
$checkMiniature = new sqlMiniatures ();
$addMiniatureArmyList = new SQLArmyList ();
$arrayKeys = ['nbr','idMiniature', 'idArmyList'];
$controle_POST = array();
$mark = [1];
if(checkPostFields ($arrayKeys, $_POST)) {
    array_push($controle_POST, $checkMiniature ->checkMiniatureOwner(filter($_POST[$arrayKeys[1]])));
    array_push($controle_POST, $addMiniatureArmyList->armyListOwner(filter($_POST[$arrayKeys[2]])));
    array_push($mark, 1);
    if(filter($_POST['nbr'] <= 4) || (filter($_POST['nbr']>0))) {
        array_push($controle_POST, 1);
    }
    array_push($mark, 1);
}
if ($mark == $controle_POST) {
    $parametre = new Preparation ();
    $param = $parametre->creationPrep ($_POST);
    $addMiniatureArmyList->insertMiniature ($param);
    return header('location:../index.php?idNav='.$idNav.'&message=Add in army list !&idArmyList='.filter($_POST[$arrayKeys[2]]));
} else {
    return header('location:../index.php?idNav='.$idNav.'&message=Error !&idArmyList='.filter($_POST[$arrayKeys[2]]));
}