<?php
// idNav 196
require ('sources/vehicles/objets/TemplatesVehicles.php');
$idVehicle = filter($_GET['idVehicle']);
$vehicleUpdate = new TemplatesVehicles ();
switch ($vehicleUpdate->checkVehicleOwner ($idVehicle)) {
    case 1:
        printingPage ();
        $vehicleUpdate->printOneVehicle ($idVehicle, $idNav);
        break;
    
    default:
         header('location:index.php?message=Navigation error !');
        break;
}




