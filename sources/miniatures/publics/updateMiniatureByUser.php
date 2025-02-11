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
    if ($fixMiniature == 2) {
        $listWeapon = new TemplateWeaponsPublic ();
        $listWeapon->displayWeaponOneMiniature ($idMiniature, $idNav, $fixMiniature) ;
    }
    if($fixMiniature == 1) {
        $listWeapon = new TemplateWeaponsPublic ();
        $listWeapon->displayWeaponOneMiniature ($idMiniature, $idNav, $fixMiniature) ;
        $displayMiniatureForm->goodForService ($idMiniature, $idNav);
        ?>
    <article class="flex-colonne-form">
        <h3 class="titleSite">Armes globales</h3>
                <details>
                    <summary class="titleSite">
                    Arme de mêlée
                 
                    </summary>
                <h4>Liste des armes de mêlée</h4>
                <?php  $listWeapon->listWeaponForChoiceUserGlobal (0, $idMiniature, $idNav, false) ?> 
                </details>
                <details>
                    <summary class="titleSite">
                    Armes de tir
                    </summary>
                <h4>Liste  armes de tir</h4>
                <?php  $listWeapon->listWeaponForChoiceUserGlobal (1, $idMiniature, $idNav, false); ?> 
                </details>
                <details>
                    <summary class="titleSite">
                    Armes explosives et à souffle
                    </summary>
                <h4>Liste armes explosives et à souffle</h4>
                <?php  $listWeapon->listWeaponForChoiceUserGlobal (2, $idMiniature, $idNav, false); ?> 
                </details>
            </article>
            
            <?php $idFaction = $displayMiniatureForm->getFactionForOneMiniature ($idMiniature);?>
            <article class="flex-colonne-form">
            <h3 class="titleSite">Arme de faction</h3>
                <details>
                    <summary class="titleSite">
                    Arme de mêlée
                    </summary>
                    <h4>Liste des armes de mêlée</h4>
            <?php $listWeapon->listWeaponFactionForChoiseUser(0, $idMiniature, $idFaction, $idNav, false);?>
                </details>
                <details>
                    <summary class="titleSite">
                    Armes de tir
                    </summary>
                <h4>Liste  armes de tir</h4>
                    <?php $listWeapon->listWeaponFactionForChoiseUser(1, $idMiniature, $idFaction, $idNav, false);?>

                </details>
            <details>
                    <summary class="titleSite">
                    Armes explosives et à souffle
                    </summary>
                <h4>Liste armes explosives et à souffle</h4>
                <?php $listWeapon->listWeaponFactionForChoiseUser(2, $idMiniature, $idFaction, $idNav, false);?>
                </details>

        <?php
    }
   




   

