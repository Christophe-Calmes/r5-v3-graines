<?php
// encodeRoutage(118)
require ('../sources/vehicles/objets/SQLvehicles.php');
$vehicleMiniatureTraitement = new SQLvehicles ();
$arrayKeys = ['idVehicle'];
$controle_POST = array();
$mark  =  [1];

if(checkPostFields ($arrayKeys, $_POST)) {
    array_push($controle_POST, $vehicleMiniatureTraitement -> checkVehicleOwner(filter($_POST[$arrayKeys[0]])));
}

if($mark == $controle_POST) {
    $parametre = new preparation ();
    $param= $parametre->creationPrep ($_POST);
    $idFaction = $vehicleMiniatureTraitement->NotInServiceVehicleByOwner ($param);
    return header('location:../index.php?idNav='.$idNav.'&message=Fixing success !&idFaction='.$idFaction);
} else {
    return header('location:../index.php?idNav='.$idNav.'&message=fixing error');
}
