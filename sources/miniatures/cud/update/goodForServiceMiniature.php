<?php 
// encodeRoutage(106)
require ('../sources/miniatures/objets/sqlMiniatures.php');
$miniatureTraitement = new sqlMiniatures ();
$arrayKeys = ['idMiniature'];
$controle_POST = array();
$mark = [1];
if(checkPostFields ($arrayKeys, $_POST)) {
    array_push($controle_POST, $miniatureTraitement->checkMiniatureOwner(filter($_POST[$arrayKeys[0]])));
}
if($mark == $controle_POST) {

    $parametre = new Preparation ();
    $param =  $parametre->creationPrep ($_POST);
    $miniatureTraitement->goodForServiceMiniature ($param);

    return header('location:../index.php?message=Good for service sir ! success !');
} else {
    return header('location:../index.php?message= Error sir !');
}