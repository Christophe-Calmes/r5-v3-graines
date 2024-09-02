<?php
// encodeRoutage(96)
require ('../sources/miniatures/objets/sqlMiniatures.php');
$miniatureTraitement = new sqlMiniatures ();
print_r($_POST);
$arrayKeys = ['dqm','dc', 'healtPoint', 'armor', 'typeTroop', 'miniatureSize','fligt','stationnaryFligt'];
$controle_POST = array();
if(checkPostFields ($arrayKeys, $_POST)) {
    
}
echo '<br/>';
print_r($controle_POST);