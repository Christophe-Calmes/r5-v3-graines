<?php 
// encodeRoutage(129)
require ('../modules/blog/objects/sqlBlog.php');
$addNewArticle = new SQLBlog ();
//[title] [article] [status] 
$arrayKeys = ['title', 'article', 'publish'];
$controle_POST = array();
$mark = [true];
if(checkPostFields($arrayKeys, $_POST)) {
    array_push($controle_POST, $checkId->controleInteger(filter($_POST[$arrayKeys[2]])));
    array_push($controle_POST, sizePost(filter($_POST[$arrayKeys[0]]), 60));
    array_push($mark, 0);
}

if($mark == $controle_POST) {
    $parametre = new Preparation ();
    $param = $parametre->creationPrepIdUser ($_POST);
    $addNewArticle ->creatNewArticle ($param);
    header('location:../index.php?message=New article success to record&idNav='.$idNav);
} else {
    header('location:../index.php?message=New article fail to record&idNav='.$idNav);
}