<?php
// adress 177
require('sources/weapons/objects/TemplateWeaponsAdministration.php');
require('sources/specialRules/objects/TemplatesSpecialRules.php');
$dataWeapon = new TemplateWeaponsAdministration ();
$dataSR = new TemplatesSpecialRules ();
$idWeapon = filter($_GET['idWeapon']);
echo '<article class="flex-rows">';
    echo '<div>';
        echo '<h3>Admin display</h3>';
        $dataWeapon->displayOneWeapon ($idWeapon);
    echo '</div>';
    echo '<div>';
        echo '<h3>Printing display</h3>';
        $dataWeapon->displayOneWeaponPrinting ($idWeapon);
    echo '</div>';
echo '</article>';
echo '<article>';
$dataSR->displaySpecialRulesForChoose (0, 1, $idWeapon, $idNav);
$dataSR->displayAssignSpecialRules ($idWeapon, $idNav);
echo '</article>';