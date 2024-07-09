<?php
// routage : 180
//require('sources/factions/objets/templatesFactions.php');
require('sources/weapons/objects/TemplateWeaponsPublic.php');
$idFaction = filter($_GET['idFaction']);
$weaponFaction = new TemplateWeaponsPublic ();
$weaponFaction->printListWeapon ($idFaction, $idNav);
