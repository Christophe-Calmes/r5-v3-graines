<?php
// encodeRoutage(67)
require ('../sources/univers/objets/sqlUnivers.php');
$universObject = new SQLUnivers ();
$arrayKey = ['nameUnivers', 'nt', 'id'];
$controle_POST = array();
if(checkPostFields ($arrayKey, $_POST)) {
    array_push($controle_POST, sizePost(filter($_POST[$arrayKey[0]]), 60));
    array_push($controle_POST, $universObject->checkNT(filter($_POST[$arrayKey[1]])));
    array_push($controle_POST, $universObject->maxUnivers ());
    array_push($controle_POST, $checkId->controleIntegerPK(filter($_POST[$arrayKey[2]])));
    array_push($controle_POST, $universObject->universOwner (filter($_POST[$arrayKey[2]])));
}
if($controle_POST == [0, 1, 1, 1, 1]) {
    $parametre = new Preparation ();
    $param = $parametre->creationPrepIdUser ($_POST);
    $universObject->updateUnivers ($param);
    header('location:../index.php?message=Update univers success to record&idNav='.$idNav.'&idUnivers='.filter($_POST['id']));
} else {
    header('location:../index.php?message=Update univers fail to record&idNav='.$idNav);
}
