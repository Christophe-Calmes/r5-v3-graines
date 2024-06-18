<?php
require ('sources/univers/objets/templateUnivers.php');
$idUnivers = filter($_GET['idUnivers']);
$updateUnivers = new templateUnivers ();
$updateUnivers->displayOneUniversUpdateForm ($idUnivers, 1, $idNav);

