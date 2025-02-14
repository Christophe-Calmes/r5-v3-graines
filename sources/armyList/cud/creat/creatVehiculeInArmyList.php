<?php
//  encodeRoutage(123)
require('../sources/armyList/objets/sqlArmyList.php');
require ('../sources/vehicles/objets/SQLvehicles.php');
$checkVehicle = new SQLvehicles ();
$addVehicleArmyList = new SQLArmyList ();
$arrayKeys = ['nbr','idVehicle', 'idArmyList'];
$controle_POST = array();
$mark = [1];
if(checkPostFields ($arrayKeys, $_POST)) {
    array_push($controle_POST, $checkVehicle->checkVehicleOwner(filter($_POST[$arrayKeys[1]])));
    array_push($controle_POST, $addVehicleArmyList->armyListOwner(filter($_POST[$arrayKeys[2]])));
    array_push($mark, 1);
    if(filter($_POST['nbr'] <= 12) || (filter($_POST['nbr']>0))) {
        array_push($controle_POST, 1);
    }
    array_push($mark, 1);
}
if ($mark == $controle_POST) {
    $parametre = new Preparation ();
    $param = $parametre->creationPrep ($_POST);
    $addVehicleArmyList->insertVehicle ($param);
    return header('location:../index.php?idNav='.$idNav.'&message=Add in army list !&idArmyList='.filter($_POST[$arrayKeys[2]]));
} else {
    return header('location:../index.php?idNav='.$idNav.'&message=Error !&idArmyList='.filter($_POST[$arrayKeys[2]]));
}