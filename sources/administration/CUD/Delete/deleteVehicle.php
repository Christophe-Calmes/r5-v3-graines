<?php
// encodeRoutage(136)
require('../sources/administration/objet/SQLAdministration.php');
$deleteVehicleByAdmin = new SQLAdministration ();
$arrayKeys = ['idVehicle'];
$controle_POST = array();
$mark = [1];
if(checkPostFields ($arrayKeys, $_POST)) {
    array_push($controle_POST, 1);
}
if($mark == $controle_POST) {
    $parametres = new Preparation ();
    $param = $parametres->creationPrep ($_POST);
    $pictureName = $deleteVehicleByAdmin->deleteVehicleByAdmin($param);
    $pathPictureToDelete = '../sources/pictures/miniaturesPictures/'.$pictureName;
    if(file_exists($pathPictureToDelete)) {
        unlink($pathPictureToDelete);
        header('location:../index.php?idNav='.$idNav.'&message=Delete vehicle');
    }
} else {
    header('location:../index.php?idNav='.$idNav.'&message=Fail delete vehicle');
}
