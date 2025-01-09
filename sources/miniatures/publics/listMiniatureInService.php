<?php
require('sources/miniatures/objets/templatesMiniatures.php');
$displayMiniature = new templatesMiniatures ();
$idFaction = filter($_GET['idFaction']);
$displayMiniature->displayMiniatureOfOneFactionInService ($idFaction, 1, $idNav);