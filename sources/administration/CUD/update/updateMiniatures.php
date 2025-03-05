<?php
// encodeRoutage(138)
require ('../sources/miniatures/objets/sqlMiniatures.php');
$miniatures = new sqlMiniatures ();
$idAllMiniature = $miniatures->getIdAllMiniature ();
foreach ($idAllMiniature  as $value) {
    $MiniaturePrice = $miniatures->solveRawMiniaturePrice ($value['id']);
    $miniatures->getRSMiniaturePrice ($value['id'], $MiniaturePrice);
}
header('location:../index.php?idNav='.$idNav.'&message=Miniature updated');