<?php
// route(201)
require('sources/armyList/objets/templateAmyList.php');
$idArmyList = filter($_GET['idArmyList']);
$armyList = new  TemplateAmyList ();
$cases = [$armyList-> armyListOwner ($idArmyList), $armyList-> getSkirmichArmyList ($idArmyList)];

$dataFaction  = $armyList->getNameOfFactionArmyList ($idArmyList);
        $idFaction = $dataFaction['idFaction'];
        $nameFaction = $dataFaction['nomFaction'];
$parametreFunction = [$idArmyList, $armyList, $idNav, $cases[1], $idFaction, $nameFaction];

function miniature ($parametreFunction, $miniatureList) {
    $type = 'Escarmouche';
    if($parametreFunction[3]==1) {
        $type = 'Bataille';
    }
    //$miniatureList = new templatesMiniatures ();
    echo '<h3>Administration de la compagnie : '. $parametreFunction[5].' - '.$parametreFunction[1]->getNameArmyList ($parametreFunction[0]).' - '.$type.' </h3>';
    $parametreFunction[1]->oneArmyListDashboard ($parametreFunction[0]);
    $miniatureList->affectedMiniatureArmyList ($parametreFunction[4], $parametreFunction[0], $parametreFunction[2]);
}
function vehicle ($parametreFunction, $vehicleList) {
    
    $vehicleList->affectedVehicleArmyList ($parametreFunction[4], $parametreFunction[0], $parametreFunction[2]);
}
function displayAffecterMiniature () {

}
$miniatureList = new templatesMiniatures ();
switch ($cases) {
    case [1, 1]:
        // Battle
        $vehicleList = new TemplatesVehicles ();
        $miniatureList->displayAffectedInListMiniature ($idArmyList);
        miniature ($parametreFunction, $miniatureList);
        vehicle ($parametreFunction, $vehicleList);
        break;
    case [1, 2] :
           // Skirmich
        miniature ($parametreFunction, $miniatureList);
        break;
    default:
   
         header('location:index.php?message=Navigation error !');
        break;
}