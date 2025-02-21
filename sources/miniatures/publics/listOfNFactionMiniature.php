<?php
require ('sources/miniatures/objets/templatesMiniatures.php');
$miniature = new templatesMiniatures ();
if(isset($_GET['page']) && (!empty($_GET['page']))) {
    $currentPage = filter($_GET['page']);
} else {
    $currentPage = 1;
}
$MiniatureByPage = 1;
$nbrMiniature = $miniature->numberOfNotAffectedMiniatureInFaction ();
$pages = ceil($nbrMiniature/$MiniatureByPage);
$firstPage = ($currentPage * $MiniatureByPage) - $MiniatureByPage;
echo '<h4>Figurine sans faction</h4>';
echo '<p>Page : '.$currentPage.'</p>';
    $miniature->displayWeaponNoFaction ($firstPage, $MiniatureByPage, $idNav);
for ($page=1; $page <= $pages ; $page++ ) {
    echo '<a class="lienNav" href="index.php?idNav='.$idNav.'&page='.$page.'">'.$page.'</a>';
  }