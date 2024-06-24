<?php
// encodeRoutage(73)
require('../sources/specialRules/objects/SQLspecialRules.php');
$UpdateSR = new SQLspecialRules ();
$arrayKeys = [ 'idRS', 'typeSpecialRules', 'nameSpecialRules', 'descriptionSpecialRules', 'price', 'valid'];
$controle_POST = array();
if(checkPostFields ($arrayKeys, $_POST)) {
    array_push($controle_POST, $UpdateSR->checkSRexist (filter($_POST[$arrayKeys[0]])));
    array_push($controle_POST, $UpdateSR ->checkTypeRule (filter($_POST[$arrayKeys[1]])));
    array_push($controle_POST, sizePost(filter($_POST[$arrayKeys[3]]), 80));
    array_push($controle_POST, sizePost(filter($_POST[$arrayKeys[4]]), 850));
    array_push($controle_POST, $UpdateSR ->checkPriceRule (filter($_POST[$arrayKeys[4]])));
    array_push($controle_POST, $UpdateSR ->checkYesOrNo (filter($_POST[$arrayKeys[5]])));
}
if($controle_POST == [1, 1, 1, 0, 1, 1]) {
    $_POST['price'] = $UpdateSR->priceTransformation (filter($_POST[$arrayKeys[4]]));
    $parametre = new Preparation ();
    $param = $parametre->creationPrep ($_POST);
    $UpdateSR->UpdateSR ($param);
    header('location:../index.php?message=Update special rules succes&idNav='.$idNav.'&idRS='.filter($_POST[$arrayKeys[0]]));
} else {

    header('location:../index.php?message=Update special rules fail&idNav='.$idNav.'&idRS='.filter($_POST[$arrayKeys[0]]));
} 