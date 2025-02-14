<?php
// encodeRoutage(112)
require('../sources/specialRules/objects/SQLspecialRules.php');
require('../sources/vehicles/objets/SQLvehicles.php');
$vehicleCheck = new SQLvehicles ();
$affectedNewSpecialRule = new SQLspecialRules ();
$arrayKeys = ['idVehicle', 'idSpecialRules'];
$controle_POST = array();
$mark  =  [1];
if(checkPostFields ($arrayKeys, $_POST)) {
    array_push($controle_POST, $affectedNewSpecialRule->checkSRexist (filter($_POST[$arrayKeys[1]])));
    array_push($controle_POST, $vehicleCheck->checkVehicleOwner((filter($_POST[$arrayKeys[0]]))));
    array_push($mark, 1);
}
if($controle_POST == $mark) {
    $parametre = new Preparation ();
    $param = $parametre->creationPrep ($_POST);
    $affectedNewSpecialRule ->deleteSRVehicle ($param) ;
    $vehicleCheck->updateVehiclePrice ($param, false);
    return header('location:../index.php?idNav='.$idNav.'&message=Unassign special rule success !&idVehicle='.filter($_POST['idVehicle']));
} else {
    return header('location:../index.php?idNav='.$idNav.'&message=Unassign special rule fail !&idVehicle='.filter($_POST['idVehicle']));
}