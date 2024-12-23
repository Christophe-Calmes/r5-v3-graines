<?php
// encodeRoutage(102)
require('../sources/specialRules/objects/SQLspecialRules.php');
require('../sources/miniatures/objets/sqlMiniatures.php');
$UnassignSpecialRule = new SQLspecialRules ();
$checkMiniature = new sqlMiniatures ();
$arrayKeys = ['idMiniature', 'idSpecialRules'];
$controle_POST = array();
$mark  = array();
if(checkPostFields ($arrayKeys, $_POST))  { 
    array_push($controle_POST, $UnassignSpecialRule->checkSRexist (filter($_POST[$arrayKeys[1]])));
    array_push($mark, 1);
    array_push($controle_POST, $checkMiniature->checkMiniatureOwner(filter($_POST[$arrayKeys[0]])));
    array_push($mark, 1);
}
if($controle_POST == $mark) {
    $parametre = new Preparation ();
    $param = $parametre->creationPrep ($_POST);
    $UnassignSpecialRule->unassignSRMiniature($param);
    $checkMiniature->updateMiniaturePrice (filter($_POST[$arrayKeys[0]]));
    header('location:../index.php?message=New special rules  success to unassgin &idNav='.$idNav.'&idMiniature='.filter($_POST[$arrayKeys[0]])); 
} else {
    header('location:../index.php?message=New special rules  fail to unassgin &idNav='.$idNav.'&idMiniature='.filter($_POST[$arrayKeys[0]])); 
}
