<?php
// encodeRoutage(83)
require ('../sources/weapons/objects/SQLWeapons.php');
require ('../sources/weapons/objects/PriceOfWeapon.php');
$creatNewWeapon = new SQLWeapons ();
$arrayKeys =  ['nameWeapon', 'idFaction', 'power', 'overPower','heavy', 'spell', 'assault', 'saturation', 'rateOfFire', 'rangeWeapon'];
$controle_POST = array();
$mark = array();

if(checkPostFields ($arrayKeys, $_POST)) {
    array_push($controle_POST, sizePost(filter($_POST[$arrayKeys[0]]), 60));
    array_push($mark, 0);
    array_push($controle_POST, $creatNewWeapon->checkFactionCreatNewWeaponByUser (filter($_POST[$arrayKeys[1]])));
    array_push($mark, 1);
    array_push($controle_POST, $creatNewWeapon->checkTypePower (filter($_POST[$arrayKeys[2]])));
    array_push($mark, 1);
    for ($i=3; $i <=7 ; $i++) { 
        array_push($controle_POST, checkBool (filter($_POST[$arrayKeys[$i]])));
        array_push($mark, 1);
    }
    array_push($controle_POST, $creatNewWeapon->checkRateOfFire (filter($_POST[$arrayKeys[8]])));
    array_push($mark, 1);
    array_push($controle_POST, $creatNewWeapon->checkRangeWeapon (filter($_POST[$arrayKeys[9]])));
    array_push($mark, 1);
 
}
if($controle_POST == $mark) {
    $_POST['typeWeapon'] = 1;
    $idFaction = filter($_POST['idFaction']);
    $calculatingPriceWeapon = new PriceOfWeapon ();
    $dataWeapon = array();
    $arrayKeys =  ['nameWeapon', 'power', 'overPower','heavy', 'spell', 'assault', 'saturation', 'rateOfFire', 'rangeWeapon'];
    for ($i=1; $i <count($arrayKeys) ; $i++) { 
        array_push($dataWeapon, filter($_POST[$arrayKeys[$i]]));
    }
    $_POST['price'] = $calculatingPriceWeapon->shootingWeaponPrice($dataWeapon);
    $parametre = new Preparation ();
    unset($_POST['idFaction']);
    $param = $parametre->creationPrepIdUser ($_POST);
    //$creatNewWeapon->recordWeaponShooting ($param);
    $creatNewWeapon->recordFactionOfWeapon ($param[11]['variable'], $idFaction);
    //header('location:../index.php?message=New weapon success to record&idNav='.$idNav);
} else {
    //header('location:../index.php?message=New weapon fail to record&idNav='.$idNav);
}