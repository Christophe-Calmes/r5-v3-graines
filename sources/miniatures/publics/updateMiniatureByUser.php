<?php
require ('sources/miniatures/objets/templatesMiniatures.php');
$displayMiniatureForm = new templatesMiniatures ();
$idMiniature = filter($_GET['idMiniature']);
$fixMiniature = $displayMiniatureForm->miniatureFix ($idMiniature);
echo '<section class="flex-colonne-form">';
echo '<article>';
$displayMiniatureForm->displayOneMiniature ($idMiniature, 1, $fixMiniature);
//echo '<button>Lock miniature</button>';
echo '</article>';
    if($fixMiniature == 0) {
        echo '<article>';
            $displayMiniatureForm->updateMiniatureByUser ($idMiniature, 1, $idNav, $fixMiniature);
        echo '</article>';
        echo '</section>';
        $specialRuleForMiniature = new TemplatesSpecialRules ();
        echo '<section class="flex-rows">';
            echo '<article>';
                $specialRuleForMiniature->displaySRforMiniature ($idMiniature, $idNav);
            echo '</article>';
            echo '<article>';
                $specialRuleForMiniature->displayAssignedSRforMiniature ($idMiniature, $idNav);
            echo '</article>';
        echo '</section>';
    }
    if($fixMiniature == 1) {
        $listWeapon = new TemplateWeaponsPublic ();
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
            <article class="flex-colonne-form">
            <?php $idFaction = $displayMiniatureForm->getFactionForOneMiniature ($idMiniature);?>
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
        </article>
        <?php
    }
        echo '<h4>List Close combat weapon</h4>';
        echo '<h4>List Shooting weapon</h4>';
        echo '<h4>List Explosive weapon</h4>';
echo '</section>';
   

