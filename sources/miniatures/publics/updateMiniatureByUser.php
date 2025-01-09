<?php
require ('sources/miniatures/objets/templatesMiniatures.php');
$displayMiniatureForm = new templatesMiniatures ();
    $idMiniature = filter($_GET['idMiniature']);
    $fixMiniature = $displayMiniatureForm->miniatureFix ($idMiniature);
    $displayMiniatureForm->displayOneMiniature ($idMiniature, 1, $fixMiniature);
    if($fixMiniature == 0) {
                $displayMiniatureForm->updateMiniatureByUser ($idMiniature, 1, $idNav, $fixMiniature);
                $specialRuleForMiniature = new TemplatesSpecialRules ();
                $specialRuleForMiniature->displayAssignedSRforMiniature ($idMiniature, $idNav);
                $specialRuleForMiniature->displaySRforMiniature ($idMiniature, $idNav);
    }
    if($fixMiniature == 1) {
        $listWeapon = new TemplateWeaponsPublic ();
        $listWeapon->displayWeaponOneMiniature ($idMiniature, $idNav) ;
        ?>
    <article class="flex-colonne-form">
        <h3 class="titleSite">Global weapon</h3>
                <details>
                    <summary class="titleSite">
                    Close combat weapon
                 
                    </summary>
                <h4>List Close combat weapon</h4>
                <?php  $listWeapon->listWeaponForChoiceUserGlobal (0, $idMiniature, $idNav) ?> 
                </details>
                <details>
                    <summary class="titleSite">
                    Shooting weapon
                    </summary>
                <h4>List Shooting weapon</h4>
                <?php  $listWeapon->listWeaponForChoiceUserGlobal (1, $idMiniature, $idNav); ?> 
                </details>
                <details>
                    <summary class="titleSite">
                    Explosive weapon
                    </summary>
                <h4>List Explosive weapon</h4>
                <?php  $listWeapon->listWeaponForChoiceUserGlobal (2, $idMiniature, $idNav); ?> 
                </details>
            </article>
            
            <?php $idFaction = $displayMiniatureForm->getFactionForOneMiniature ($idMiniature);?>
            <article class="flex-colonne-form">
            <h3 class="titleSite">Faction weapon</h3>
                <details>
                    <summary class="titleSite">
                    Close combat weapon
                    </summary>
            <h4>List Close combat weapon</h4>
            <?php $listWeapon->listWeaponFactionForChoiseUser(0, $idMiniature, $idFaction, $idNav);?>
                </details>
                <details>
                    <summary class="titleSite">
                    Shooting weapon
                    </summary>
                    <h4>List Shooting weapon</h4>
                    <?php $listWeapon->listWeaponFactionForChoiseUser(1, $idMiniature, $idFaction, $idNav);?>

                </details>
            <details>
                    <summary class="titleSite">
                    Explosive weapon
                    </summary>
                <h4>List Explosive weapon</h4>
                <?php $listWeapon->listWeaponFactionForChoiseUser(2, $idMiniature, $idFaction, $idNav);?>
                </details>

        <?php
    }
   




   

