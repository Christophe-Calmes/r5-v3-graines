<?php
    require('sources/weapons/objects/TemplateWeaponsAdministration.php');
    $admiWeapon = new TemplateWeaponsAdministration ();
    if(isset($_GET['page']) && (!empty($_GET['page']))) {
        $currentPage = filter($_GET['page']);
    } else {
        $currentPage = 1;
    }
    $WeaponByPage = 10;
    $nbrWeaponNoFixe = $admiWeapon->numberWeaponNoFixe ();
    $pages = ceil($nbrWeaponNoFixe/$WeaponByPage);
    $firstPage = ($currentPage * $WeaponByPage) - $WeaponByPage;
        echo '<h4>Weapon no fix</h4>';
        echo '<p>Page : '.$currentPage.'</p>';
    $admiWeapon->displayWeaponNoFix ($firstPage, $WeaponByPage, $idNav, 0);


for ($page=1; $page <= $pages ; $page++ ) {
    echo '<a class="lienNav" href="index.php?idNav='.$idNav.'&page='.$page.'">'.$page.'</a>';
  }