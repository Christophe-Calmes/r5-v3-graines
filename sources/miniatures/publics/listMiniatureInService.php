<h3>Liste des figurines en service</h3>
<?php
require('sources/miniatures/objets/templatesMiniatures.php');
$displayMiniature = new templatesMiniatures ();
$idFaction = filter($_GET['idFaction']);
$checkFaction = new SQLFactions ();
switch ($checkFaction->factionOwner ($idFaction)) {
    case 1:
        $displayMiniature->displayMiniatureOfOneFactionInService ($idFaction, 1, $idNav);
        break;
    
    default:
         header('location:index.php?message=Navigation error !');
        break;
}