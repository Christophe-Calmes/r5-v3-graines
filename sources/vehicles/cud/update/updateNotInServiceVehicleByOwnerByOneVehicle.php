<?php
// encodeRoutage(120)
require ('../sources/vehicles/objets/SQLvehicles.php');
$vehicleMiniatureTraitement = new SQLvehicles ();
$arrayKeys = ['idVehicle'];
$controle_POST = array();
$mark = array();

if(checkPostFields ($arrayKeys, $_POST)) {
 array_push($controle_POST, $vehicleMiniatureTraitement -> checkVehicleOwner(filter($_POST[$arrayKeys[0]])));
 array_push($mark, 1);
}

if($mark == $controle_POST) {
    $parametre = new preparation ();
    $param= $parametre->creationPrep ($_POST);
    $vehicleMiniatureTraitement->InServiceVehicleByOwner ($param);
    return header('location:../index.php?idNav='.$idNav.'&message=Vehicule en service !&idVehicle='.filter($_POST[$arrayKeys[0]]));
} else {
    return header('location:../index.php?idNav='.$idNav.'&message=fixing error');
}
