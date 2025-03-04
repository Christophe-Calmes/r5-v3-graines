<?php
require ('sources/administration/objet/TemplateAdministration.php');
$AdministrationVehiclePicture = new TemplateAdministration ();
if(isset($_GET['page']) && (!empty($_GET['page']))) {
    $currentPage = filter($_GET['page']);
} else {
    $currentPage = 1;
}
$nbrPicture = $AdministrationVehiclePicture->nbrVehiclePicture  ();
$PictureByPage = 9;
$pages = ceil($nbrPicture/$PictureByPage);
$firstPage = ($currentPage * $PictureByPage) - $PictureByPage;
echo '<h4 class="page">Picture of vehicle</h4>';
echo '<p>Number of pictures : '.$nbrPicture.'</p>';
echo '<h4 class="page">Page : '.$currentPage.'</h4>';
    $AdministrationVehiclePicture->displayVehiclesPicture ($firstPage, $PictureByPage, $idNav);
for ($page=1; $page <= $pages ; $page++ ) {
    echo '<a class="lienNav" href="index.php?idNav='.$idNav.'&page='.$page.'">'.$page.'</a>';
  }