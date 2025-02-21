<?php
    require ('sources/weapons/objects/TemplateWeaponsPublic.php');
    $weapons = new TemplateWeaponsPublic ();
    if(isset($_GET['page']) && (!empty($_GET['page']))) {
        $currentPage = filter($_GET['page']);
    } else {
        $currentPage = 1;
    }
    $WeaponByPage = 1;
    $nbrWeaponNoFaction = $weapons->nbrNoFactionWeapon ();
    $pages = ceil($nbrWeaponNoFaction/$WeaponByPage);
    $firstPage = ($currentPage * $WeaponByPage) - $WeaponByPage;
        echo '<h4>Armes sans faction</h4>';
        echo '<p>Page : '.$currentPage.'</p>';
        $weapons->displayWeaponNoFactaion ($firstPage, $WeaponByPage, $idNav);
for ($page=1; $page <= $pages ; $page++ ) {
    echo '<a class="lienNav" href="index.php?idNav='.$idNav.'&page='.$page.'">'.$page.'</a>';
  }