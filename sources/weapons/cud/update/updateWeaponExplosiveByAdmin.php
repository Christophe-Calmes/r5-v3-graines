<?php
// encodeRoutage(91)
require ('../sources/weapons/objects/SQLWeapons.php');
require ('../sources/weapons/objects/PriceOfWeapon.php');
$updateNewWeapon = new SQLWeapons ();
$arrayKeys =  ['nameWeapon', 'power', 'overPower','heavy', 'spell', 'assault', 'saturation', 'rateOfFire', 'rangeWeapon', 'templateType', 'blastDice', 'idWeapon'];
$controle_POST = array();
$mark = array();
if(checkPostFields ($arrayKeys, $_POST)) {
    array_push($controle_POST, sizePost(filter($_POST[$arrayKeys[0]]), 60));
    array_push($mark, 0);
    array_push($controle_POST, $updateNewWeapon->checkTypePower (filter($_POST[$arrayKeys[1]])));
    array_push($mark, 1);
    for ($i=2; $i <=6 ; $i++) { 
        array_push($controle_POST, checkBool (filter($_POST[$arrayKeys[$i]])));
        array_push($mark, 1);
    }
    array_push($controle_POST, $updateNewWeapon->checkRateOfFire (filter($_POST[$arrayKeys[7]])));
    array_push($mark, 1);
    array_push($controle_POST, $updateNewWeapon->checkRangeWeapon (filter($_POST[$arrayKeys[8]])));
    array_push($mark, 1);
    array_push($controle_POST, $updateNewWeapon->checkGabaritType (filter($_POST[$arrayKeys[9]])));
    array_push($mark, 1);
    array_push($controle_POST, $updateNewWeapon->checkBlastDice (filter($_POST[$arrayKeys[10]])));
    array_push($mark, 1);
    array_push($controle_POST, $updateNewWeapon->checkWeaponExist (filter($_POST[$arrayKeys[11]])));
    array_push($mark, 1);
}
if($controle_POST == $mark) {
    $calculatingPriceWeapon = new PriceOfWeapon ();
    $dataWeapon = array();
    for ($i=1; $i <count($arrayKeys) ; $i++) { 
        array_push($dataWeapon, filter($_POST[$arrayKeys[$i]]));
    }
    $rawPrice = $calculatingPriceWeapon->blastWeaponPrice ($dataWeapon);
    $_POST['price'] = $calculatingPriceWeapon->specialRulesPrice(filter($_POST[$arrayKeys[9]]), $rawPrice);
    $parametre = new Preparation ();
    $param = $parametre-> creationPrep ($_POST);
    $updateNewWeapon->updateExplosiveWeapon ($param);
    header('location:../index.php?message=Update weapon success to record&idNav='.$idNav.'&idWeapon='.filter($_POST[$arrayKeys[11]]));
} else {
    header('location:../index.php?message=Update weapon fail to record&idNav='.$idNav.'&idWeapon='.filter($_POST[$arrayKeys[11]]));
}
