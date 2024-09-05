<?php
// encodeRoutage(96)
require ('../sources/weapons/objects/SQLWeapons.php');
$chekFaction = new SQLWeapons ();
require ('../sources/miniatures/objets/sqlMiniatures.php');
require('../functions/functionToken.php');
function intervalMove ($data) {
    if(($data > 18)||($data <0)) {
        return false;
    }
    return true;
}
$miniatureTraitement = new sqlMiniatures ();
$arrayKeys = ['idFaction','nameMiniature', 'move', 'dqm','dc', 'healtPoint', 'armor', 'typeTroop', 'miniatureSize','fligt','stationnaryFligt', 'namePicture'];
$controle_POST = array();
$mark = [1, 0];
if(checkPostFields ($arrayKeys, $_POST)) {
    array_push($controle_POST, $chekFaction->checkFactionCreatNewWeaponByUser (filter($_POST[$arrayKeys[0]])));
    array_push($controle_POST, sizePost(filter($_POST[$arrayKeys[1]]), 60));
    array_push($controle_POST, $checkId->controleIntegerPK(filter($_POST[$arrayKeys[2]])));
    array_push($controle_POST, intervalMove(filter($_POST[$arrayKeys[2]])));
    array_push($controle_POST, $miniatureTraitement->checkDice (filter($_POST[$arrayKeys[3]])));
    array_push($controle_POST, $miniatureTraitement->checkDice (filter($_POST[$arrayKeys[4]])));
    array_push($controle_POST, $miniatureTraitement->checkHealPoint (filter($_POST[$arrayKeys[5]])));
    array_push($controle_POST, $miniatureTraitement->checkArmor (filter($_POST[$arrayKeys[6]])));
    array_push($controle_POST, $miniatureTraitement->checkTypeTroop (filter($_POST[$arrayKeys[7]])));
    array_push($controle_POST, $miniatureTraitement->checkMiniatureSize (filter($_POST[$arrayKeys[8]])));
    array_push($controle_POST, $miniatureTraitement->checkYes (filter($_POST[$arrayKeys[9]])));
    array_push($controle_POST, $miniatureTraitement->checkYes (filter($_POST[$arrayKeys[10]])));
    array_push($controle_POST, controlePicture($_FILES, 50000, 'namePicture'));
    for ($i=0; $i <11 ; $i++) { 
        array_push($mark, 1);
    }
}
if($controle_POST == $mark) {
    $_POST['price'] = $miniatureTraitement->solveMiniaturePrice($_POST);
    $namePicture = genToken (5).date('Y').filter($_FILES['namePicture']['name']);
    print_r($namePicture);
}

