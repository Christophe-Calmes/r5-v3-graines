<?php
//  encodeRoutage(68)

require ('../sources/univers/objets/sqlUnivers.php');
$universObject = new sqlUnivers ();
$arrayKey = ['id'];
$controle_POST = array();
if(checkPostFields ($arrayKey, $_POST)) {
    array_push($controle_POST, 1);
}
if($controle_POST == [1]) {
    $parametre = new Preparation ();
    $param = $parametre->creationPrepIdUser ($_POST);
    $universObject->deleteUnivers ($param);
    header('location:../'.findTargetRoute(155).'&message=Delete univers success');
} else {
    header('location:../'.findTargetRoute(155).'&message=Delete univers fail');
}