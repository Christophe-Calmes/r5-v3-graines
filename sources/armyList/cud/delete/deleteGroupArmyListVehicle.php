<?php
// encodeRoutage(125)
// Array ( [idVehicle] => 10 [idList] => 3 [idJoinMiniatureArmyList] => 1 )
require('../sources/armyList/objets/sqlArmyList.php');
require ('../sources/vehicles/objets/SQLvehicles.php');
$checkVehicle = new SQLvehicles ();
$deleteVehicleArmyList = new SQLArmyList ();
$arrayKeys = ['idVehicle', 'idList', 'idJoinMiniatureArmyList'];
$controle_POST = array();
$mark = [1];
if(checkPostFields ($arrayKeys, $_POST)) {
    array_push($controle_POST, $checkVehicle->checkVehicleOwner (filter($_POST[$arrayKeys[0]])));
    array_push($controle_POST, $deleteVehicleArmyList->armyListOwner(filter($_POST[$arrayKeys[1]])));
    array_push($mark, 1);
}if ($mark == $controle_POST) {
    $deleteVehicleArmyList->deleteVehicleGroupe (filter($_POST[$arrayKeys[2]]));

 return header('location:../index.php?idNav='.$idNav.'&message=Delete group success !&idArmyList='.filter($_POST[$arrayKeys[1]]));
} else {
    return header('location:../index.php?idNav='.$idNav.'&message=Error !&idArmyList='.filter($_POST[$arrayKeys[1]]));
}