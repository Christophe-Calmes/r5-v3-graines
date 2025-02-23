<?php
// route(203)
require ('sources/armyList/objets/templateAmyList.php');
$idArmyList = filter($_GET['idArmyList']);
$armyList = new  TemplateAmyList ();
$cases = [$armyList-> armyListOwner ($idArmyList), $armyList-> getSkirmichArmyList ($idArmyList)];
printingPage ();
switch ($cases) {
    case [1, 1]:
        // Battle
        echo '<h3>Bataille</h3>';
        $armyList->printingIntroduction($idArmyList, true);
        $armyList->printMiniatures ($idArmyList);
        $armyList-> printVehicle ($idArmyList);
        break;
    case [1, 2] :
           // Skirmich
           echo '<h3>Escarmouche</h3>';
          $armyList->printingIntroduction($idArmyList, false);
            $armyList->printMiniatures ($idArmyList);

        break;
    default:
   
         header('location:index.php?message=Navigation error !');
        break;
}