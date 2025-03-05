<?php
// encodeRoutage(139)
require('../sources/vehicles/objets/SQLvehicles.php');
$updateVehicle = new SQLvehicles ();
$updateVehicle->updateAllVehicle ();
header('location:../index.php?idNav='.$idNav.'&message=Vehicle updated');