<?php
// encodeRoutage(74)
require('../sources/specialRules/objects/SQLspecialRules.php');
$DeleteSR = new SQLspecialRules ();
$arrayKeys = [ 'idRS'];
$controle_POST = array();
if(checkPostFields ($arrayKeys, $_POST)) {
    array_push($controle_POST, $DeleteSR->checkSRexist (filter($_POST[$arrayKeys[0]])));
}
if($controle_POST == [1]) {
    $parametre = new Preparation ();
    $param = $parametre->creationPrep ($_POST);
    $DeleteSR->DeleteSR ($param);
    header('location:../index.php?message=Delete special rules success to record');
} else {
    header('location:../index.php?message=Delete special rules faild&idNav='.$idNav.'&idRS='.filter($_POST[$arrayKeys[0]]));
} 