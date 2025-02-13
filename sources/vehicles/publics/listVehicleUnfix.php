<?php
// route 195
require('sources/vehicles/objets/TemplatesVehicles.php');
$idFaction = filter($_GET['idFaction']);
$checkFaction = new SQLFactions ();
$listVehicleFaction = new TemplatesVehicles ();
switch ($checkFaction->factionOwner ($idFaction)) {
    case 1:
        $listVehicleFaction->printListVehicle ([$idFaction, 1], $idNav);
        break;
    
    default:
         header('location:index.php?message=Navigation error !');
        break;
}