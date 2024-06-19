<?php
// encodeRoutage(66)
require ('../sources/univers/objets/sqlUnivers.php');
$universObject = new SQLUnivers ();
$arrayKeys = ['nameUnivers', 'nt'];
$controle_POST = array();
if(checkPostFields ($arrayKeys, $_POST)) {
    array_push($controle_POST, sizePost(filter($_POST[$arrayKeys[0]]), 60));
    array_push($controle_POST, $universObject->checkNT(filter($_POST[$arrayKeys[1]])));
    array_push($controle_POST, $universObject->maxUnivers ());
}
if($controle_POST == [0, 1, 1]) {
    $parametre = new Preparation ();
    $param = $parametre->creationPrepIdUser ($_POST);
    $universObject->insertNewUnivers ($param);
    header('location:../index.php?message=New univers success to record&idNav='.$idNav);
} else {
    header('location:../index.php?message=New univers fail to record&idNav='.$idNav);
}
