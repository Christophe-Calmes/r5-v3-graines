<?php
// encodeRoutage(115)
require ('../sources/vehicles/objets/SQLvehicles.php');
$vehicleMiniatureTraitement = new SQLvehicles ();
$arrayKeys = ['idVehicle'];
$controle_POST = array();
$mark  =  [1];

if(checkPostFields ($arrayKeys, $_POST)) {
 array_push($controle_POST, $vehicleMiniatureTraitement -> checkVehicleOwner(filter($_POST[$arrayKeys[0]])));

}

if($mark == $controle_POST) {
    $vehicleMiniatureTraitement->equipVehicle(filter($_POST[$arrayKeys[0]]));
    return header('location:../index.php?idNav='.$idNav.'&message=Fixing success !&idVehicle='.filter($_POST[$arrayKeys[0]]));
} else {
    return header('location:../index.php?idNav='.$idNav.'&message=fixing error');
}
