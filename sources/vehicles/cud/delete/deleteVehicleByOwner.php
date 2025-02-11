<?php
// encodeRoutage(114)
require ('../sources/vehicles/objets/SQLvehicles.php');
$deleteVehicle = new SQLvehicles ();
$arrayKeys = ['idVehicle'];
$controle_POST = array();
$mark = array();

if(checkPostFields ($arrayKeys, $_POST)) {
 array_push($controle_POST, $deleteVehicle->checkVehicleOwner(filter($_POST[$arrayKeys[0]])));
 array_push($mark, 1);
}
if($mark == $controle_POST) {
    $pictureName = $deleteVehicle->getPictureVehicleName (filter($_POST[$arrayKeys[0]]));
    $pathPictureToDelete = '../sources/pictures/miniaturesPictures/'.$pictureName;
    if(file_exists($pathPictureToDelete)) {
        unlink($pathPictureToDelete);
        header('location:../index.php?idNav='.$idNav.'&message=Delete miniature&idFaction='.$pictureName[1]);
    }
    $deleteVehicle->deleteVehicleByOwner(filter($_POST[$arrayKeys[0]]));
    header('location:../index.php?message=Delete vehicle');
} else {
    header('location:../index.php?message=Delete vehicle');
}