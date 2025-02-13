<?php
require ('sources/univers/objets/templateUnivers.php');
$idUnivers = filter($_GET['idUnivers']);
$updateUnivers = new TemplateUnivers ();
switch ($updateUnivers->universOwner($idUnivers)) {
    case 1:
        $updateUnivers->displayOneUniversUpdateForm ($idUnivers, 1, $idNav);
        break;
    default:
        header('location:index.php?message=Navigation error !');
        break;
}




