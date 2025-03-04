<?php
require ('sources/administration/objet/TemplateAdministration.php');
$AdministrationMiniaturePicture = new TemplateAdministration ();
if(isset($_GET['page']) && (!empty($_GET['page']))) {
    $currentPage = filter($_GET['page']);
} else {
    $currentPage = 1;
}


$nbrPicture = $AdministrationMiniaturePicture->nbrMiniaturePicture ();
if($nbrPicture == 0) {
    $nbrPicture = 1;
    $PictureByPage = $nbrPicture/1;
} else {
    $PictureByPage = $nbrPicture/10;
}

$pages = ceil($nbrPicture/$PictureByPage);
$firstPage = ($currentPage * $PictureByPage) - $PictureByPage;
echo '<h4 class="page">Picture of miniature</h4>';
echo '<h4 class="page">Page : '.$currentPage.'</h4>';
   
for ($page=1; $page <= $pages ; $page++ ) {
    echo '<a class="lienNav" href="index.php?idNav='.$idNav.'&page='.$page.'">'.$page.'</a>';
  }