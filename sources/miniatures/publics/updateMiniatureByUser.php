<?php
require ('sources/miniatures/objets/templatesMiniatures.php');
    $displayMiniatureForm = new templatesMiniatures ();
    $specialRuleForMiniature = new TemplatesSpecialRules ();
    $listWeapon = new TemplateWeaponsPublic ();
    $idMiniature = filter($_GET['idMiniature']);
    $fixMiniature = $displayMiniatureForm->miniatureFix ($idMiniature);


    switch ($displayMiniatureForm->checkMiniatureOwner($idMiniature)) {
        case 1:
            switch ($fixMiniature) {
                case 0:
                    $displayMiniatureForm->displayOneMiniature ($idMiniature, 1, $fixMiniature);
                    $displayMiniatureForm->updateMiniatureByUser ($idMiniature, 1, $idNav, $fixMiniature);
                    $specialRuleForMiniature->displayAssignedSRforMiniature ($idMiniature, $idNav);
                    $specialRuleForMiniature->displaySRforMiniature ($idMiniature, $idNav);
                    break;
                case 1:
                    $displayMiniatureForm->displayOneMiniature ($idMiniature, 1, $fixMiniature);
                    $listWeapon->displayWeaponOneMiniature ($idMiniature, $idNav, $fixMiniature) ;
                    $displayMiniatureForm->goodForService ($idMiniature, $idNav);
                    $idFaction = $displayMiniatureForm->getFactionForOneMiniature ($idMiniature);
                    $displayMiniatureForm->listMiniatureChoiceGlobalWeapon ($idMiniature, $idNav);
                    $displayMiniatureForm->listMiniatureChoiceFactionWeapon ($idMiniature, $idNav, $idFaction);
                    break;
                case 2:
                    printingPage ();
                    $displayMiniatureForm->displayOneMiniatureDatasheet ($idMiniature, 1, $fixMiniature);
        
                    break;
                default:
                    $displayMiniatureForm->displayOneMiniature ($idMiniature, 1, $fixMiniature);
                    $listWeapon->displayWeaponOneMiniature ($idMiniature, $idNav, $fixMiniature);
                    break;
            }
            break;
        default:
            header('location:index.php?message=Navigation error !');
           break;
    }
    
   



   

