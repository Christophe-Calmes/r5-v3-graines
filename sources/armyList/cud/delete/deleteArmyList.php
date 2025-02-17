<?php
// encodeRoutage(126)
require('../sources/armyList/objets/sqlArmyList.php');
$deleteArmyList = new SQLArmyList ();
$arrayKeys = ['idList'];
$controle_POST = array();
$mark = [1];
if(checkPostFields ($arrayKeys, $_POST)) {
    array_push($controle_POST, $deleteArmyList->armyListOwner(filter($_POST[$arrayKeys[0]])));
}
if ($mark == $controle_POST) {
    $parametre = new  Preparation ();
    $param = $parametre->creationPrep ($_POST);
    $deleteArmyList->deleteList ($param);
 return header('location:../index.php?message=Delete list');
} else {
    return header('location:../index.php?message=Error');
}