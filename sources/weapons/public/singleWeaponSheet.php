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
$dataFix = $displayWeapon->displayOneWeapon ($idWeapon);
echo '<br/>';
if($dataFix[0] == 0) {
    echo'<button type="button" id="magic" class="open">Modify weapon ?</button>
    <div id="hiddenForm">';
        $displayWeapon ->formUpdateWeaponByUser ($idWeapon, $idNav);
    echo '</div>';

include 'javaScript/magicButtonMenus.php';
echo'<form action="'.encodeRoutage(95).'" method="post">
<input type="hidden" name="idWeapon" value="'.$idWeapon.'"/>
<button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Fix weapon</button>
</form>';
} 
if (($dataFix[0] == 1)&&($dataFix[1] == 0)) {
    echo'<form action="'.encodeRoutage(95).'" method="post">
    <input type="hidden" name="idWeapon" value="'.$idWeapon.'"/>
    <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Unfix weapon</button>
    </form>';
}
echo '</div>';
echo '</div>';
echo '<div>';
    echo '<h3>Printing display</h3>';
    $displayWeapon->printingOneWeapon ($idWeapon);
    echo '</div>';
    echo '</article>';
    echo '<article class="flex-colonne-center">';
if($dataFix[0] == 0) {
    $dataSR->displayAssignSpecialRules ($idWeapon, $idNav, 1);
    $dataSR->displaySpecialRulesForChoose (0, 1, $idWeapon, $idNav, 1);

} else {
    $dataSR->displaySpecialRules ($idWeapon);
}
echo '</article>';
