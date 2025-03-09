<?php
require ('sources/weapons/objects/TemplateWeaponsPublic.php');
$formWeapon = new TemplateWeaponsPublic ();
$FactionsUser = new SQLFactions ();
$dataFactions = $FactionsUser->getUserFaction ();
if(!empty($dataFactions)) {
    echo '<article class="flex-colonne-form">
    <h3 class="titleSite">Add new weapon forms</h3>
    <details>
        <summary class="titleSite">
            Armes de mêlée
        </summary>
        <h4>Ajouter une armes de mêlée</h4>';
        $formWeapon->formCreatWeapon (0, $idNav);
    echo '</details>
    <details>
        <summary class="titleSite">
            Arme de tir
        </summary>
        <h4>Ajouter une arme de tir</h4>';
        $formWeapon->formCreatWeapon (1, $idNav);
    echo '</details>
    <details>
        <summary class="titleSite">
            Arme explosive
        </summary>
        <h4>Ajouter une arme explosive</h4>';
        $formWeapon->formCreatWeapon (2, $idNav);
    echo'</details>
</article>';
} else {
    echo '<h2>Pas de faction dans la base de données</h2>';
}
