<?php
// encodeRoutage(97)
require ('../sources/miniatures/objets/sqlMiniatures.php');
$miniatureTraitement = new sqlMiniatures ();
$arrayKeys = ['idMiniature'];
$controle_POST = array();
$mark = [1];
if(checkPostFields ($arrayKeys, $_POST)) {
    array_push($controle_POST, $miniatureTraitement->checkOwnerMiniature(filter($_POST[$arrayKeys[0]])));
}
if($mark == $controle_POST) {
    $pictureName = $miniatureTraitement->getNamePictureForDelete (filter($_POST[$arrayKeys[0]]));
    $pathPictureToDelete = '../sources/pictures/miniaturesPictures/'.$pictureName[0];
    if(file_exists($pathPictureToDelete)) {
        unlink($pathPictureToDelete);
        header('location:../index.php?idNav='.$idNav.'&message=Delete miniature&idFaction='.$pictureName[1]);
    }
}  else {
    header('location:../index.php?idNav='.$idNav.'&message=Fail delete miniature&idFaction='.$pictureName[1]);
}