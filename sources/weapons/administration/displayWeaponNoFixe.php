<?php
    require('sources/weapons/objects/TemplateWeaponsAdministration.php');
    $admiWeapon = new TemplateWeaponsAdministration ();
    if(isset($_GET['page']) && (!empty($_GET['page']))) {
        $currentPage = filter($_GET['page']);
    } else {
        $currentPage = 1;
    }
    $WeaponByPage = 2;
    $nbrWeaponNoFixe = $admiWeapon->numberWeaponNoFixe ();
    $pages = ceil($nbrWeaponNoFixe/$WeaponByPage);
    $firstPage = ($currentPage * $WeaponByPage) - $WeaponByPage;
?>
<h4>Weapon no fixe</h4>
<p>Page : <?=$currentPage?></p>

<?php
for ($page=1; $page <= $pages ; $page++ ) {
    echo '<a class="lienNav" href="index.php?idNav='.$idNav.'&page='.$page.'">'.$page.'</a>';
  }