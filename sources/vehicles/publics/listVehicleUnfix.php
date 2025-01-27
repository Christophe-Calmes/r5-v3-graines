<?php
// route 195
require('sources/vehicles/objets/TemplatesVehicles.php');
$idFaction = filter($_GET['idFaction']);
$listVehicleFaction = new TemplatesVehicles ();
$listVehicleFaction->printListVehicle ([$idFaction, 1], $idNav);
