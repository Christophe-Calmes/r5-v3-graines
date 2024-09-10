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
print_r($controle_POST);
if($mark == $controle_POST) {
    $pictureName = $miniatureTraitement->getNamePicture (filter($_POST[$arrayKeys[0]]));
    $pathPictureToDelete = '../sources/pictures/miniaturesPictures/'.$pictureName;
    if(file_exists($pathPictureToDelete)) {
        unlink($pathPictureToDelete);
        header('location:../index.php?message=Delete miniature');
    }
}  else {
    header('location:../index.php?message=Fail delete miniature');
}