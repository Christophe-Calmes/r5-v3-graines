<?php
// routage : 180
require('sources/weapons/objects/TemplateWeaponsPublic.php');
$idFaction = filter($_GET['idFaction']);
$weaponFaction = new TemplateWeaponsPublic ();
$checkFaction = new SQLFactions ();
switch ($checkFaction->factionOwner ($idFaction)) {
    case 1:
        $weaponFaction->printListWeapon ($idFaction, $idNav);
        break;
    
    default:
         header('location:index.php?message=Navigation error !');
        break;
}

