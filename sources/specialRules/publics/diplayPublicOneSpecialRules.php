<?php
require ('sources/specialRules/objects/TemplatesSpecialRules.php');
$idSpecialRule = filter($_GET['idRS']);
$adminSpecialRules = new TemplatesSpecialRules ();
switch ($adminSpecialRules->checkSRexist ($idSpecialRule)) {
    case 'value':
        $adminSpecialRules->PublicDisplayOneRS ($idSpecialRule , $idNav);
        break;
    
    default:
        header('location:index.php?message=Navigation error !');
        break;
}
