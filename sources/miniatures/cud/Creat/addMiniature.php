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
$arrayKeys = ['idFaction','nameMiniature', 'moving', 'dqm','dc', 'healtPoint', 'armor', 'typeTroop', 'miniatureSize','fligt','stationnaryFligt', 'namePicture'];
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

print_r($controle_POST);
echo '<br/>';
print_r($mark);
if($controle_POST == $mark) {
    $_POST['price'] = $miniatureTraitement->solveMiniaturePrice($_POST);
    $namePicture = genToken (5).date('Y').filter($_FILES['namePicture']['name']);
    $_POST['pictureName'] = $namePicture;
   if(file_exists('../sources/pictures/miniaturesPictures')) {
        if(move_uploaded_file($_FILES['namePicture']['tmp_name'], $f='../sources/pictures/miniaturesPictures/'.$namePicture)) {
            chmod($f, 0644);
            $_POST['pictureName'] = $namePicture;
            $parametre = new Preparation ();
            $param = $parametre->creationPrepIdUser ($_POST);
            $miniatureTraitement->creatMiniaturesByUser ($param);
            return header('location:../index.php?message=Record new miniature sucess.&idNav='.$idNav);
        } else {
            return header('location:../index.php?message=The target file is not found.');
        }

    } else {
        return header('location:../index.php?message=Record error !');
    }
} else if ($controle_POST[12] == false) {
     return header('location:../index.php?message=Format or size picture error !');
}  else {
    return header('location:../index.php?message=Record error !');
}

