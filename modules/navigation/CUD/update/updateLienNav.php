<?php
// encodeRoutage(20)
require '../functions/functionToken.php';
$_POST['targetRoute'] = IntToken(20);
$parametre = new Preparation();
$param = $parametre->creationPrep ($_POST);
$update = "UPDATE `navigation`
SET `nomNav`= :nomNav, `cheminNav`=:cheminNav, `menuVisible`=:menuVisible,
`zoneMenu`=:zoneMenu, `ordre`=:ordre, `niveau`=:niveau, `valide`=:valide,
`deroulant`=:deroulant, `targetRoute`= :targetRoute
WHERE `idNav`= :id";
ActionDB::access($update, $param);
header('location:../index.php?idNav='.$idNav.'&message=Menu modifié&id='.filter($_POST['id']));
