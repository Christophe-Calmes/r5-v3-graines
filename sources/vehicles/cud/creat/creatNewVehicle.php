<?php
//  encodeRoutage(108)
require ('../sources/weapons/objects/SQLWeapons.php');
require ('../sources/vehicles/objets/SQLvehicles.php');
require('../functions/functionToken.php');
$chekFaction = new SQLWeapons ();
$addVehicle = new SQLvehicles ();

$arrayKeys = ['idFaction','nameVehicle', 'dqm','dc', 'armor' ,'structurePoint', 'sizeVehicle' ,'typeVehicle', 'moving', 'fligt', 'stationnaryFligt'];
$controle_POST = array();
$mark = array();
if(checkPostFields ($arrayKeys, $_POST)) {
    array_push($controle_POST, $chekFaction->checkFactionCreatNewWeaponByUser (filter($_POST[$arrayKeys[0]])));
    array_push($mark, 1);
    array_push($controle_POST, $addVehicle->controleMovingVehicle(filter($_POST[$arrayKeys[8]])));
    array_push($mark, 1);
    array_push($controle_POST, sizePost(filter($_POST[$arrayKeys[1]]), 60));
    array_push($mark, 0);
    array_push($controle_POST, controlePicture($_FILES, 50000, 'namePicture'));
    array_push($mark, 1);
    array_push($controle_POST, $addVehicle->checkYes($_POST[$arrayKeys[9]]));
    array_push($mark, 1);
    array_push($controle_POST, $addVehicle->checkYes($_POST[$arrayKeys[10]]));
    array_push($mark, 1);
    array_push($controle_POST, $addVehicle->checkDice ($_POST[$arrayKeys[2]]));
    array_push($mark, 1);
    array_push($controle_POST, $addVehicle->checkDice ($_POST[$arrayKeys[3]]));
    array_push($mark, 1);
    array_push($controle_POST, $addVehicle->checkArray ($_POST[$arrayKeys[4]], 0));
    array_push($mark, 1);
    array_push($controle_POST, $addVehicle->checkArray ($_POST[$arrayKeys[5]], 1));
    array_push($mark, 1);
    array_push($controle_POST, $addVehicle->checkArray ($_POST[$arrayKeys[6]], 2));
    array_push($mark, 1);
    array_push($controle_POST, $addVehicle->checkArray ($_POST[$arrayKeys[7]], 3));
    array_push($mark, 1);


}

if($controle_POST == $mark) {
    $_POST['price'] = $addVehicle->solveVehiclePrice($_POST);
    $namePicture = 'V'.genToken(6).date('Y').filter($_FILES['namePicture']['name']);
    $_POST['namePicture'] = $namePicture;
    if(file_exists('../sources/pictures/miniaturesPictures')) {
        if(move_uploaded_file($_FILES['namePicture']['tmp_name'], $f='../sources/pictures/miniaturesPictures/'.$namePicture)) {
            chmod($f, 0644);
            $_POST['namePicture'] = $namePicture;
            $parametre = new Preparation ();
            $param = $parametre->creationPrepIdUser ($_POST);
            $addVehicle->creatVehiclesByUser ($param);
            return header('location:../index.php?message=Record new vehicle success.&idNav='.$idNav);
        } else {
            return header('location:../index.php?message=The target file is not found.');
        }
    } else {
        return header('location:../index.php?message=Record error !');
    }
  
} else if ($controle_POST[12] == false) {
    return header('location:../index.php?message=Format or size picture error !');
}  else {
    return header('location:../index.php?message=Record error !');
}