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
        $fix = $dataWeapon->displayOneWeapon ($idWeapon);
        echo '<br/>';
        if($fix == 0) {
        echo'<button type="button" id="magic" class="open">Modify weapon ?</button>
                <div id="hiddenForm">';
                $dataWeapon->formUpdateWeaponByAdmin ($idWeapon, $idNav);
                echo '</div>';
            
            include 'javaScript/magicButtonMenus.php';
        }
    echo '</div>';
    echo '<div>';
        echo '<h3>Printing display</h3>';
        $dataWeapon->displayOneWeaponPrinting ($idWeapon);
    echo '</div>';
echo '</article>';
echo '<article>';
if($fix == 0) {
    $dataSR->displayAssignSpecialRules ($idWeapon, $idNav);
    $dataSR->displaySpecialRulesForChoose (0, 1, $idWeapon, $idNav);
} else {
    $dataSR->displaySpecialRules ($idWeapon);
}
echo '</article>';