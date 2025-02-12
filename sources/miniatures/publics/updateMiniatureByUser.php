<?php
require ('sources/miniatures/objets/templatesMiniatures.php');
    $displayMiniatureForm = new templatesMiniatures ();
    $idMiniature = filter($_GET['idMiniature']);
    $fixMiniature = $displayMiniatureForm->miniatureFix ($idMiniature);
    
    
    switch ($fixMiniature) {
        case 0:
            $displayMiniatureForm->displayOneMiniature ($idMiniature, 1, $fixMiniature);
            $displayMiniatureForm->updateMiniatureByUser ($idMiniature, 1, $idNav, $fixMiniature);
            $specialRuleForMiniature = new TemplatesSpecialRules ();
            $specialRuleForMiniature->displayAssignedSRforMiniature ($idMiniature, $idNav);
            $specialRuleForMiniature->displaySRforMiniature ($idMiniature, $idNav);
            break;
        case 1:
            $displayMiniatureForm->displayOneMiniature ($idMiniature, 1, $fixMiniature);
            $listWeapon = new TemplateWeaponsPublic ();
            $listWeapon->displayWeaponOneMiniature ($idMiniature, $idNav, $fixMiniature) ;
            $displayMiniatureForm->goodForService ($idMiniature, $idNav);
            $idFaction = $displayMiniatureForm->getFactionForOneMiniature ($idMiniature);
            $displayMiniatureForm->listMiniatureChoiceGlobalWeapon ($idMiniature, $idNav);
            $displayMiniatureForm->listMiniatureChoiceFactionWeapon ($idMiniature, $idNav, $idFaction);
            break;
        case 2:
            /*$displayMiniatureForm->displayOneMiniature ($idMiniature, 1, $fixMiniature);
            $listWeapon = new TemplateWeaponsPublic ();
            $listWeapon->displayWeaponOneMiniature ($idMiniature, $idNav, $fixMiniature) ;*/
            $displayMiniatureForm->displayOneMiniatureDatasheet ($idMiniature, 1, $fixMiniature);

            break;
        default:
            $displayMiniatureForm->displayOneMiniature ($idMiniature, 1, $fixMiniature);
            $listWeapon = new TemplateWeaponsPublic ();
            $listWeapon->displayWeaponOneMiniature ($idMiniature, $idNav, $fixMiniature);
            break;
    }



   

