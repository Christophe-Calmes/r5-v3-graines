<?php
require ('sources/weapons/objects/TemplateWeaponsAdministration.php');
$formWeapon = new TemplateWeaponsAdministration ();
?>
<article class="flex-colonne-form">
    <h3 class="titleSite">Add new weapon forms</h3>
    <details>
        <summary class="titleSite">
            Close combat weapon
        </summary>
        <h4>Form Close combat weapon</h4>
        <?php $formWeapon->formCreatWeaponByAdmin (0, $idNav) ?>
    </details>
    <details>
        <summary class="titleSite">
            Shooting weapon
        </summary>
        <h4>Form Shooting weapon</h4>
        <?php $formWeapon->formCreatWeaponByAdmin (1, $idNav) ?>
    </details>
    <details>
        <summary class="titleSite">
            Explosive weapon
        </summary>
        <h4>Form Explosive weapon</h4>
        <?php $formWeapon->formCreatWeaponByAdmin (2, $idNav) ?>
    </details>
</article>