<?php
// A revoir mardi
// findTargetRoute(182)
require('sources/weapons/objects/TemplateWeaponsPublic.php');
require('sources/specialRules/objects/TemplatesSpecialRules.php');
$idWeapon = filter($_GET['idWeapon']);
$displayWeapon = new TemplateWeaponsPublic ();
$status = $displayWeapon->statusWeapon ($idWeapon);
    $check = array();
    array_push($check, $displayWeapon->checkWeaponOwner ($idWeapon));
    array_push($check, $displayWeapon->checkGlobalWeapon ($idWeapon));
    

switch ($check) {
    case [1,0]:
        $dataSR = new TemplatesSpecialRules ();
        if($status[0] == 0) {
            echo '<article class="flex-clo">';
            echo '<div>';
            echo '<h3>Administration</h3>';
            echo'<button type="button" id="magic" class="open">Modify weapon ?</button>
            <div id="hiddenForm">';
                $displayWeapon ->formUpdateWeaponByUser ($idWeapon, $idNav);
            echo '</div>';
        
        include 'javaScript/magicButtonMenus.php';
        echo'<form action="'.encodeRoutage(95).'" method="post">
        <input type="hidden" name="idWeapon" value="'.$idWeapon.'"/>
        <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Fix</button>
        </form>';
        echo '</div>';
        } 

        if (($status[0] == 1)&&($status[1] == 0)&&(!$displayWeapon->WeaponAllReadyAffected ([['prep'=>':idWeapon', 'variable'=>$idWeapon]]))) {
            echo'<form action="'.encodeRoutage(95).'" method="post">
            <input type="hidden" name="idWeapon" value="'.$idWeapon.'"/>
            <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Unfix</button>
            </form>';
        }
        echo '<div class="flex-rows">';
                echo '<aside class="dataSheetWeapon">';
                echo '<h3>Fiche imprimable</h3>';
                $displayWeapon->printOneWeaponDatasheet ($idWeapon);
                echo '</aside>';
            echo '</div>';
            echo '<h3>Coefficient de prix : '.$displayWeapon->getPriceWeapon ($idWeapon, $status[0]).' $</h3>';
            echo '</article>';
            echo '<article class="flex-colonne-center">';
        if($status[0] == 0) {
            $dataSR->displayAssignSpecialRules ($idWeapon, $idNav, 1);
            $dataSR->displaySpecialRulesForChoose (0, 1, $idWeapon, $idNav, 1);
         }
        echo '</article>';
 
        break;
    case [0, 1]:
        // Global weapon only
        echo '<article class="flex-center ">';
        echo '<aside class="dataSheetWeapon">';
        echo '<h3>Arme global : Fiche imprimable</h3>';
        $displayWeapon->printOneWeaponDatasheet ($idWeapon);
        echo '</aside>';
        echo '</article>';
        echo '<h3>Coefficient de prix : '.$displayWeapon->getPriceWeapon ($idWeapon, $status[0]).' $</h3>';
        break;

    default:
        header('location:index.php?message=Navigation Error');
        break;
}
