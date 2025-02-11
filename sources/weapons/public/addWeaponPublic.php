<?php
require ('sources/weapons/objects/TemplateWeaponsPublic.php');
$formWeapon = new TemplateWeaponsPublic ();
?>
<article class="flex-colonne-form">
    <h3 class="titleSite">Add new weapon forms</h3>
    <details>
        <summary class="titleSite">
            Armes de mêlée
        </summary>
        <h4>Ajouter une armes de mêlée</h4>
        <?php $formWeapon->formCreatWeapon (0, $idNav) ?>
    </details>
    <details>
        <summary class="titleSite">
            Arme de tir
        </summary>
        <h4>Ajouter une arme de tir</h4>
        <?php $formWeapon->formCreatWeapon (1, $idNav) ?>
    </details>
    <details>
        <summary class="titleSite">
            Arme explosive
        </summary>
        <h4>Ajouter une arme explosive</h4>
        <?php $formWeapon->formCreatWeapon (2, $idNav) ?>
    </details>
</article>