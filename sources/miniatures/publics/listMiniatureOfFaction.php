<?php
require('sources/miniatures/objets/templatesMiniatures.php');
$displayMiniature = new templatesMiniatures ();
$idFaction = filter($_GET['idFaction']);
$displayMiniature->displayMiniatureOfOneFaction ($idFaction, 1, $idNav);