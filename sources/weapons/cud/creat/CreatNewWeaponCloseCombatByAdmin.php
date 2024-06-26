<?php
// encodeRoutage(75)
require ('../sources/weapons/objects/SQLWeapons.php');
require ('../sources/weapons/objects/PriceOfWeapon.php');
$creatNewWeapon = new SQLWeapons ();
$arrayKeys =  ['nameWeapon', 'power', 'overPower', 'heavy', 'spell'];
$controle_POST = array();
$mark = array();
if(checkPostFields ($arrayKeys, $_POST)) {
    array_push($controle_POST, sizePost(filter($_POST[$arrayKeys[0]]), 60));
    array_push($mark, 0);
    array_push($controle_POST, $creatNewWeapon->checkTypePower (filter($_POST[$arrayKeys[1]])));
    array_push($mark, 1);
    for ($i=2; $i <=4 ; $i++) { 
        array_push($controle_POST, checkBool (filter($_POST[$arrayKeys[$i]])));
        array_push($mark, 1);
    }
}
if($controle_POST == $mark) {
    $_POST['typeWeapon'] = 0;
    $calculatingPriceWeapon = new PriceOfWeapon ();
    $dataWeapon = array();
    for ($i=1; $i <count($arrayKeys) ; $i++) { 
        array_push($dataWeapon, filter($_POST[$arrayKeys[$i]]));
    }
    $_POST['price'] = $calculatingPriceWeapon->closeWeaponPrice ($dataWeapon);
    $parametre = new Preparation ();
    $param = $parametre->creationPrepIdUser ($_POST);
    $creatNewWeapon->recordWeapon ($param);
    header('location:../index.php?message=New weapon success to record&idNav='.$idNav);
} else {
    header('location:../index.php?message=New weapon fail to record&idNav='.$idNav);
}