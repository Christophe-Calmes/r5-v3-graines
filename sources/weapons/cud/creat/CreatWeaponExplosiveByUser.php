<?php
// encodeRoutage(84)
require ('../sources/weapons/objects/SQLWeapons.php');
require ('../sources/weapons/objects/PriceOfWeapon.php');
$creatNewWeapon = new SQLWeapons ();
$arrayKeys =  ['nameWeapon', 'idFaction', 'power', 'overPower','heavy', 'spell', 'assault', 'saturation', 'rateOfFire', 'rangeWeapon', 'templateType', 'blastDice'];
$controle_POST = array();
$mark  =  [1];

if(checkPostFields ($arrayKeys, $_POST)) {
    array_push($controle_POST, sizePost(filter($_POST[$arrayKeys[0]]), 60));
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
    array_push($controle_POST, $creatNewWeapon->checkGabaritType (filter($_POST[$arrayKeys[10]])));
    array_push($mark, 1);
    array_push($controle_POST, $creatNewWeapon->checkBlastDice (filter($_POST[$arrayKeys[11]])));
    array_push($mark, 1);
}
if($controle_POST == $mark) {
    $_POST['typeWeapon'] = 2;
    $idFaction = filter($_POST['idFaction']);
    $calculatingPriceWeapon = new PriceOfWeapon ();
    $dataWeapon = array();
    $arrayKeys =  ['nameWeapon', 'power', 'overPower','heavy', 'spell', 'assault', 'saturation', 'rateOfFire', 'rangeWeapon', 'templateType', 'blastDice'];
    for ($i=1; $i <count($arrayKeys) ; $i++) { 
        array_push($dataWeapon, filter($_POST[$arrayKeys[$i]]));
    }
    $_POST['price'] = $calculatingPriceWeapon->closeWeaponPrice ($dataWeapon);
    $parametre = new Preparation ();
    unset($_POST['idFaction']);
    $parametre = new Preparation ();
    $param = $parametre->creationPrepIdUser ($_POST);
    $creatNewWeapon->recordWeaponBlast ($param);
    $creatNewWeapon->recordFactionOfWeapon ($param[13]['variable'], $idFaction);
    header('location:../index.php?message=New weapon success to record&idNav='.$idNav);
} else {
    header('location:../index.php?message=New weapon fail to record&idNav='.$idNav);
}