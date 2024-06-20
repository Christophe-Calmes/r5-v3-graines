<?php
require ('sources/specialRules/objects/TemplatesSpecialRules.php');
$idSpecialRule = filter($_GET['idRS']);
$adminSpecialRules = new TemplatesSpecialRules ();
$adminSpecialRules->displayOneRSAdmin ($idSpecialRule, $idNav);