<?php 
// route 199
require('sources/armyList/objets/templateAmyList.php');
$idFaction = filter($_GET['idFaction']);
$checkFaction = new SQLFactions ();
$armyList = new TemplateAmyList ();
switch ($checkFaction->factionOwner ($idFaction)) {
    case 1:
        echo '<h3>Liste des compagnies '.$checkFaction->getNameFaction ($idFaction)[0]['nomFaction'].'</h3>';
        $armyList->ArmyListOfOneFaction ($idFaction, $idNav);
        break;
    
    default:
         header('location:index.php?message=Navigation error !');
        break;
}