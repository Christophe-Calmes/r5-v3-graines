<?php
// encodeRoutage(105)
require ('../sources/miniatures/objets/sqlMiniatures.php');
require ('../sources/weapons/objects/SQLWeapons.php');
$miniatureTraitement = new sqlMiniatures ();
$checkWeaponExist = new SQLWeapons ();
$arrayKeys = ['idWeapon', 'idMiniature'];
$controle_POST = array();
$mark = array();
if(checkPostFields ($arrayKeys, $_POST)) {
    array_push($controle_POST, $miniatureTraitement->checkOwnerMiniature(filter($_POST[$arrayKeys[1]])));
    array_push($mark, 1);
    array_push($controle_POST, $checkWeaponExist->checkWeaponExist (filter($_POST[$arrayKeys[0]])));
    array_push($mark, 1);
}
if($controle_POST == $mark) {
    $parametre = new Preparation ();
    $param = $parametre->creationPrep ($_POST);
    echo '<br/>';
    print_r($controle_POST);
    $miniatureTraitement->substractWeaponOnMiniature ($param);
    return header('location:../index.php?idNav='.$idNav.'&message=Weapon unaffected sucess !&idMiniature='.filter($_POST[$arrayKeys[1]]));
} else {
    return header('location:../index.php?idNav='.$idNav.'&message=Error !&idMiniature='.filter($_POST[$arrayKeys[1]]));
}
