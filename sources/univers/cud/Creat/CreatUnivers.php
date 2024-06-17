<?php
// encodeRoutage(66)
require ('../sources/univers/objets/sqlUnivers.php');
$universObject = new sqlUnivers ();
$arrayKey = ['nameUnivers', 'nt'];
$controle_POST = array();
if(checkPostFields ($arrayKey, $_POST)) {
    array_push($controle_POST, sizePost(filter($_POST[$arrayKey[0]]), 60));
    array_push($controle_POST, $universObject->checkNT(filter($_POST[$arrayKey[1]])));
    array_push($controle_POST, $universObject->maxUnivers ());
}

$parametre = new Preparation ();
$param = $parametre->creationPrepIdUser ($_POST);
if($controle_POST == [0, 1, 1]) {
    $universObject->insertNewUnivers ($param);
    header('location:../index.php?message=New univers success to record&idNav='.$idNav);
} else {
    header('location:../index.php?message=New univers fail to record&idNav='.$idNav);
}
