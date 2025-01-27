<?php
// idNav 196
require ('sources/vehicles/objets/TemplatesVehicles.php');
$idVehicle = filter($_GET['idVehicle']);
$vehicleUpdate = new TemplatesVehicles ();
$vehicleUpdate->printOneVehicle ($idVehicle);