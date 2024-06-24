<?php
function DisplaySpecialsRules ($specialRulesType, $idNav) {
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
      $adminSpecialRules->publicDisplaySRTitle ($firstPage,  $RSbyPage, $specialRulesType );
    
    
      for ($page=1; $page <= $pages ; $page++ ) {
        echo '<a class="lienNav" href="index.php?idNav='.$idNav.'&page='.$page.'">'.$page.'</a>';
      }
}
