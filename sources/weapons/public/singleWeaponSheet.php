<?php
// findTargetRoute(182)
require('sources/weapons/objects/TemplateWeaponsPublic.php');
$idWeapon = filter($_GET['idWeapon']);
$displayWeapon = new TemplateWeaponsPublic ();
$displayWeapon->printingOneWeapon ($idWeapon);
