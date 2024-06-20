<?php
require ('sources/specialRules/objects/TemplatesSpecialRules.php');
require ('functions/functionPagination.php');
$specialRulesType = 0;
$adminSpecialRules = new TemplatesSpecialRules ();
if(isset($_GET['page']) && (!empty($_GET['page']))) {
    $currentPage = filter($_GET['page']);
  } else {
    $currentPage = 1;
  }
  $RSbyPage = 10;
  $nbrRS = $adminSpecialRules->numberOfRS ($specialRulesType);
  $pages = ceil($nbrRS/$RSbyPage);
  $firstPage = ($currentPage * $RSbyPage) - $RSbyPage;
  echo '<h4>'.$adminSpecialRules->setTypeRules($specialRulesType).' specials rules</h4>';
  $adminSpecialRules->displaySRTitle ($firstPage,  $RSbyPage, $specialRulesType );


  for ($page=1; $page <= $pages ; $page++ ) {
    echo '<a class="lienNav" href="index.php?idNav='.$idNav.'&page='.$page.'">'.$page.'</a>';
  }