<?php
require('sources/miniatures/objets/templatesMiniatures.php');
$displayMiniature = new templatesMiniatures ();
$checkFaction = new SQLFactions ();
$idFaction = filter($_GET['idFaction']);
switch ($checkFaction->factionOwner ($idFaction)) {
    case 1:
        $displayMiniature->displayMiniatureOfOneFaction ($idFaction, 1, $idNav);
        break;
    
    default:
         header('location:index.php?message=Navigation error !');
        break;
}


