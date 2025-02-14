<?php
// encodeRoutage(92)
require ('../sources/weapons/objects/SQLWeapons.php');
require ('../sources/weapons/objects/PriceOfWeapon.php');
$updateNewWeapon = new SQLWeapons ();
$arrayKeys =  ['nameWeapon', 'power', 'overPower', 'heavy', 'spell', 'idWeapon'];
$controle_POST = array();
$mark  =  [0];

if(checkPostFields ($arrayKeys, $_POST)) {
    array_push($controle_POST, sizePost(filter($_POST[$arrayKeys[0]]), 60));
    array_push($controle_POST, $updateNewWeapon->checkTypePower (filter($_POST[$arrayKeys[1]])));
    array_push($mark, 1);
    for ($i=2; $i <=4 ; $i++) { 
        array_push($controle_POST, checkBool (filter($_POST[$arrayKeys[$i]])));
        array_push($mark, 1);
    }
    array_push($controle_POST, $updateNewWeapon->checkWeaponExist (filter($_POST[$arrayKeys[5]])));
    array_push($mark, 1);
}
if($controle_POST == $mark) {
    $calculatingPriceWeapon = new PriceOfWeapon ();
    $dataWeapon = array();
    for ($i=1; $i <count($arrayKeys) ; $i++) { 
        array_push($dataWeapon, filter($_POST[$arrayKeys[$i]]));
    }
    $rawPrice = $calculatingPriceWeapon->closeWeaponPrice ($dataWeapon);
    // Add specials rules price
    $_POST['price'] = $calculatingPriceWeapon->specialRulesPrice(filter($_POST[$arrayKeys[5]]), $rawPrice);
    $parametre = new Preparation ();
    $param = $parametre-> creationPrepIdUser ($_POST);
    $updateNewWeapon->updateCloseWeapon ($param);
    header('location:../index.php?message=Update weapon success to record&idNav='.$idNav.'&idWeapon='.filter($_POST[$arrayKeys[5]]));
} else {
    header('location:../index.php?message=Update weapon fail to record&idNav='.$idNav.'&idWeapon='.filter($_POST[$arrayKeys[5]]));
}