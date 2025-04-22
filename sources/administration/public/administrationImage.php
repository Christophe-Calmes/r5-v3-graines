<?php
require ('sources/administration/objet/TemplateAdministration.php');
$AdministrationMiniaturePicture = new TemplateAdministration ();
if(isset($_GET['page']) && (!empty($_GET['page']))) {
    $currentPage = filter($_GET['page']);
    echo '<p class="page">Page : '.$currentPage.'</p>';
} else {
    $currentPage = 1;
}
$nbrPicture = $AdministrationMiniaturePicture->nbrMiniaturePicture ();
$PictureByPage = 40;
$pages = ceil($nbrPicture/$PictureByPage);
$firstPage = ($currentPage * $PictureByPage) - $PictureByPage;
echo '<h4 class="page">Picture of miniature</h4>';
echo '<p>Number of pictures : '.$nbrPicture.'</p>';
echo '<h4 class="page">Page : '.$currentPage.'</h4>';
    $AdministrationMiniaturePicture->displayMiniaturePicture ($firstPage, $PictureByPage, $idNav);
for ($page=1; $page <= $pages ; $page++ ) {
    echo '<a class="lienNav" href="index.php?idNav='.$idNav.'&page='.$page.'">'.$page.'</a>';
  }