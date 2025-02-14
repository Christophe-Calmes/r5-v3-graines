<?php
//encodeRoutage(101)
require('../sources/specialRules/objects/SQLspecialRules.php');
require('../sources/miniatures/objets/sqlMiniatures.php');
$affectedNewSpecialRule = new SQLspecialRules ();
$miniatureCheck = new sqlMiniatures ();
$arrayKeys = ['idMiniature', 'idSpecialRules'];
$controle_POST = array();
$mark  =  [1];
if(checkPostFields ($arrayKeys, $_POST))  {
    array_push($controle_POST, $affectedNewSpecialRule->checkSRexist (filter($_POST[$arrayKeys[1]])));
    array_push($controle_POST, $miniatureCheck ->checkMiniatureOwner((filter($_POST[$arrayKeys[0]]))));
    array_push($mark, 1);
}
if($controle_POST == $mark) {
    $parametre = new Preparation ();
    $param = $parametre->creationPrep ($_POST);
    $affectedNewSpecialRule -> assignSRMiniature ($param);
    $miniatureCheck->updateMiniaturePrice ($param[0]['variable']);
    header('location:../index.php?message=New special rules  success to assgin &idNav='.$idNav.'&idMiniature='.filter($_POST[$arrayKeys[0]])); 
} else {
    header('location:../index.php?message=New special rules  fail to assgin &idNav='.$idNav.'&idMiniature='.filter($_POST[$arrayKeys[0]])); 
}