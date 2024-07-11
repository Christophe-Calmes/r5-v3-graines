<?php
// findTargetRoute(182)
require('sources/weapons/objects/TemplateWeaponsPublic.php');
require('sources/specialRules/objects/TemplatesSpecialRules.php');
$idWeapon = filter($_GET['idWeapon']);
$displayWeapon = new TemplateWeaponsPublic ();
$dataSR = new TemplatesSpecialRules ();
$displayWeapon->printingOneWeapon ($idWeapon);

$fix = $displayWeapon->displayOneWeapon ($idWeapon);
if($fix == 0) {
    $dataSR->displayAssignSpecialRules ($idWeapon, $idNav, 1);
    $dataSR->displaySpecialRulesForChoose (0, 1, $idWeapon, $idNav, 1);
} else {
    $dataSR->displaySpecialRules ($idWeapon);
}

