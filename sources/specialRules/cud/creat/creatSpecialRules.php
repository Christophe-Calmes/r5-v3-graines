<?php
// encodeRoutage(72)
require('../sources/specialRules/objects/SQLspecialRules.php');
$creatNewSR = new SQLspecialRules ();
$arrayKeys = [ 'typeSpecialRules','price', 'nameSpecialRules', 'descriptionSpecialRules'];
$controle_POST = array();
if(checkPostFields ($arrayKeys, $_POST)) {
    array_push($controle_POST, $creatNewSR->checkTypeRule (filter($_POST[$arrayKeys[0]])));
    array_push($controle_POST, $creatNewSR->checkPriceRule (filter($_POST[$arrayKeys[1]])));
    array_push($controle_POST, sizePost(filter($_POST[$arrayKeys[2]]), 80));
    array_push($controle_POST, sizePost(filter($_POST[$arrayKeys[3]]), 850));
}
if($controle_POST == [1, 1, 0, 0]) {
    $_POST['price'] = $creatNewSR->priceTransformation (filter($_POST[$arrayKeys[1]]));
    $parametre = new Preparation ();
    $param = $parametre->creationPrep ($_POST);
    $creatNewSR->insertNewSP ($param);
    header('location:../index.php?message=New special rules success to record&idNav='.$idNav);
} else {

    header('location:../index.php?message=New special rules  fail to record&idNav='.$idNav);
}
