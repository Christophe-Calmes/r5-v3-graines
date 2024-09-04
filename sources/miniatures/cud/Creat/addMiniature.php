<?php
// encodeRoutage(96)
require ('../sources/miniatures/objets/sqlMiniatures.php');
function intervalMove ($data) {
    if(($data > 18)||($data <0)) {
        return false;
    }
    return true;
}
$miniatureTraitement = new sqlMiniatures ();
$arrayKeys = ['nameMiniature', 'move', 'dqm','dc', 'healtPoint', 'armor', 'typeTroop', 'miniatureSize','fligt','stationnaryFligt'];
$controle_POST = array();

if(checkPostFields ($arrayKeys, $_POST)) {
    array_push($controle_POST, sizePost(filter($_POST[$arrayKeys[0]]), 60));
    array_push($controle_POST, $checkId->controleIntegerPK(filter($_POST[$arrayKeys[1]])));
    array_push($controle_POST, intervalMove(filter($_POST[$arrayKeys[1]])));
    array_push($controle_POST, $miniatureTraitement->checkDice (filter($_POST[$arrayKeys[2]])));
    array_push($controle_POST, $miniatureTraitement->checkDice (filter($_POST[$arrayKeys[3]])));
    array_push($controle_POST, $miniatureTraitement->checkHealPoint (filter($_POST[$arrayKeys[4]])));
    array_push($controle_POST, $miniatureTraitement->checkArmor (filter($_POST[$arrayKeys[5]])));
    array_push($controle_POST, $miniatureTraitement->checkTypeTroop (filter($_POST[$arrayKeys[6]])));
    array_push($controle_POST, $miniatureTraitement->checkMiniatureSize (filter($_POST[$arrayKeys[7]])));
    array_push($controle_POST, $miniatureTraitement->checkYes (filter($_POST[$arrayKeys[8]])));
    array_push($controle_POST, $miniatureTraitement->checkYes (filter($_POST[$arrayKeys[9]])));
}
echo '<br/>';
$miniatureTraitement->solveMiniaturePrice($_POST);
