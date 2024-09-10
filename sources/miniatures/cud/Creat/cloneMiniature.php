<?php
//  encodeRoutage(98)
require ('../sources/miniatures/objets/sqlMiniatures.php');
require('../functions/functionToken.php');
$miniatureTraitement = new sqlMiniatures ();
$arrayKeys = ['idMiniature'];
$controle_POST = array();
$mark = [1];
if(checkPostFields ($arrayKeys, $_POST)) {
    array_push($controle_POST, $miniatureTraitement->checkOwnerMiniature(filter($_POST[$arrayKeys[0]])));
}

if($mark == $controle_POST) {
    $namePicture = $miniatureTraitement->getNamePicture (filter($_POST[$arrayKeys[0]]));
    $pathOriginPicture = '../sources/pictures/miniaturesPictures/'.$namePicture;
    $namePictureOriginal = substr($namePicture, 9);
    $namePicture = genToken (5).date('Y').$namePictureOriginal;
    $pathCopyPicture = '../sources/pictures/miniaturesPictures/'.$namePicture;
    copy($pathOriginPicture, $pathCopyPicture);
    $clone = $miniatureTraitement-> getOneMiniatureRow(filter($_POST[$arrayKeys[0]]));
    


}  else {
    header('location:../index.php?message=Fail clonning miniature');
}