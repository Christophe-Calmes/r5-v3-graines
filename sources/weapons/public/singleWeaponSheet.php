<?php
// findTargetRoute(182)
require('sources/weapons/objects/TemplateWeaponsPublic.php');
require('sources/specialRules/objects/TemplatesSpecialRules.php');
$idWeapon = filter($_GET['idWeapon']);
$displayWeapon = new TemplateWeaponsPublic ();
$dataSR = new TemplatesSpecialRules ();
echo '<article class="flex-rows">';
echo '<div>';
echo '<h3>Admin display</h3>';
$fix = $displayWeapon->displayOneWeapon ($idWeapon);
echo '<br/>';
if($fix == 0) {
    echo'<button type="button" id="magic" class="open">Modify weapon ?</button>
    <div id="hiddenForm">';
        $displayWeapon ->formUpdateWeaponByUser ($idWeapon, $idNav);
    echo '</div>';

include 'javaScript/magicButtonMenus.php';
}
echo '</div>';
echo '</div>';
echo '<div>';
    echo '<h3>Printing display</h3>';
    $displayWeapon->printingOneWeapon ($idWeapon);
    echo '</div>';
    echo '</article>';
    echo '<article>';
if($fix == 0) {
    $dataSR->displayAssignSpecialRules ($idWeapon, $idNav, 1);
    $dataSR->displaySpecialRulesForChoose (0, 1, $idWeapon, $idNav, 1);

} else {
    $dataSR->displaySpecialRules ($idWeapon);
}
echo '</article>';
