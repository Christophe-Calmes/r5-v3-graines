<?php
require ('sources/weapons/objects/TemplateWeaponsAdministration.php');
$formWeapon = new TemplateWeaponsAdministration ();
?>
<details>
    <summary>
        Close combat weapon
    </summary>
    <h4>Form Close combat weapon</h4>
    <?php $formWeapon->formCreatWeaponByAdmin (0, $idNav) ?>
</details>
<details>
    <summary>
        Shooting weapon
    </summary>
    <h4>Form Shooting weapon</h4>
    <?php $formWeapon->formCreatWeaponByAdmin (1, $idNav) ?>
</details>
<details>
    <summary>
        Explosive weapon
    </summary>
    <h4>Form Explosive weapon</h4>
    <?php $formWeapon->formCreatWeaponByAdmin (2, $idNav) ?>
</details>