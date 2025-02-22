<?php
require ('sources/vehicles/objets/TemplatesVehicles.php');
$vehicle = new TemplatesVehicles ();
if(isset($_GET['page']) && (!empty($_GET['page']))) {
    $currentPage = filter($_GET['page']);
} else {
    $currentPage = 1;
}
$VehicleByPage = 1;
$nbrVehicle = $vehicle->numberOfNotAffectedVehicleInFaction ();
$pages = ceil($nbrVehicle/$VehicleByPage);
$firstPage = ($currentPage * $VehicleByPage) - $VehicleByPage;
echo '<h4>Figurine sans faction</h4>';
echo '<p>Page : '.$currentPage.'</p>';
    $vehicle->updateVehicleNoFactionAffected ($firstPage, $VehicleByPage, $idNav);
for ($page=1; $page <= $pages ; $page++ ) {
    echo '<a class="lienNav" href="index.php?idNav='.$idNav.'&page='.$page.'">'.$page.'</a>';
  }