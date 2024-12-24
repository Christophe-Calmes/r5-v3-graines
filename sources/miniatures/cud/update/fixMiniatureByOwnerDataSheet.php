<?php
//  encodeRoutage(103)

require ('../sources/miniatures/objets/sqlMiniatures.php');
$miniatureTraitement = new sqlMiniatures ();
$arrayKeys = ['idMiniature'];
$controle_POST = array();
$mark = [1];
if(checkPostFields ($arrayKeys, $_POST)) {
    array_push($controle_POST, $miniatureTraitement->checkMiniatureOwner(filter($_POST[$arrayKeys[0]])));
}
if($mark == $controle_POST) {
    $idFaction = $miniatureTraitement->changeFixMiniature (filter($_POST[$arrayKeys[0]]));
    return header('location:../index.php?idNav='.$idNav.'&message=Fixing success !&idMiniature='.filter($_POST[$arrayKeys[0]]));
} else {
    return header('location:../index.php?idNav='.$idNav.'&message=fixing error !&idMiniature='.filter($_POST[$arrayKeys[0]]));
}
