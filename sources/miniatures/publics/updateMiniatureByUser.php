<?php
require ('sources/miniatures/objets/templatesMiniatures.php');
$displayMiniatureForm = new templatesMiniatures ();
$idMiniature = filter($_GET['idMiniature']);
$displayMiniatureForm->displayOneMiniature ($idMiniature, 1);