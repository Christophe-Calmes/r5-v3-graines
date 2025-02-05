<?php
// encodeRoutage(110)
require ('../sources/weapons/objects/SQLWeapons.php');
require ('../sources/vehicles/objets/SQLvehicles.php');
require('../functions/functionToken.php');
$chekFaction = new SQLWeapons ();
$updateVehicle = new SQLvehicles ();

$arrayKeys = ['idFaction','nameVehicle', 'dqm','dc', 'armor' ,'structurePoint', 'sizeVehicle' ,'typeVehicle', 'moving', 'fligt', 'stationnaryFligt', 'idVehicle'];
$controle_POST = array();
$mark = array();
$picture = false;
if(checkPostFields ($arrayKeys, $_POST)) {
    array_push($controle_POST, $chekFaction->checkFactionCreatNewWeaponByUser (filter($_POST[$arrayKeys[0]])));
    array_push($mark, 1);
    array_push($controle_POST, $updateVehicle->controleMovingVehicle(filter($_POST[$arrayKeys[8]])));
    array_push($mark, 1);
    array_push($controle_POST, sizePost(filter($_POST[$arrayKeys[1]]), 60));
    array_push($mark, 0);
    if($_FILES['namePicture']['error'] == 0) {
        array_push($controle_POST, controlePicture($_FILES, 50000, 'namePicture'));
        array_push($mark, 1);
    }
    array_push($controle_POST, $updateVehicle->checkYes($_POST[$arrayKeys[9]]));
    array_push($mark, 1);
    array_push($controle_POST, $updateVehicle->checkYes($_POST[$arrayKeys[10]]));
    array_push($mark, 1);
    array_push($controle_POST, $updateVehicle->checkDice ($_POST[$arrayKeys[2]]));
    array_push($mark, 1);
    array_push($controle_POST, $updateVehicle->checkDice ($_POST[$arrayKeys[3]]));
    array_push($mark, 1);
    array_push($controle_POST, $updateVehicle->checkArray ($_POST[$arrayKeys[4]], 0));
    array_push($mark, 1);
    array_push($controle_POST, $updateVehicle->checkArray ($_POST[$arrayKeys[5]], 1));
    array_push($mark, 1);
    array_push($controle_POST, $updateVehicle->checkArray ($_POST[$arrayKeys[6]], 2));
    array_push($mark, 1);
    array_push($controle_POST, $updateVehicle->checkArray ($_POST[$arrayKeys[7]], 3));
    array_push($mark, 1);
    array_push($controle_POST, $checkId->controleIntegerPK(filter($_POST[$arrayKeys[11]])));
    array_push($mark, 1);
}
if($_FILES['namePicture']['error'] == 0) {
    $namePicture = $updateVehicle->getPictureVehicleName (filter($_POST[$arrayKeys[11]]));
    $pathPictureToDelete = '../sources/pictures/miniaturesPictures/'.$namePicture;
    if(file_exists($pathPictureToDelete)) {
        unlink($pathPictureToDelete);
    }
    $namePicture = 'V'.genToken(6).date('Y').filter($_FILES['namePicture']['name']);
    $_POST['namePicture'] = $namePicture;
    if(file_exists('../sources/pictures/miniaturesPictures')) {
        if(move_uploaded_file($_FILES['namePicture']['tmp_name'], $f='../sources/pictures/miniaturesPictures/'.$namePicture)) {
            chmod($f, 0644);
            $_POST['namePicture'] = $namePicture;
        }
    }
    $picture = true;
}


if($controle_POST == $mark) {
    $_POST['price'] = $updateVehicle->solveVehiclePrice($_POST);
    $parametre = new Preparation ();
    $param = $parametre->creationPrepIdUser ($_POST, $picture);
    $updateVehicle->updateVehicle ($param, $picture);
    return header('location:../index.php?message=Update vehicle success.&idNav='.$idNav.'&idVehicle='.filter($_POST[$arrayKeys[11]]));
    } else {
    return header('location:../index.php?message=Update vehicle fail.&idNav='.$idNav.'&idVehicle='.filter($_POST[$arrayKeys[11]]));
}