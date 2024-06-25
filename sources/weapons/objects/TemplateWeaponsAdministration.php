<?php
require ('sources/weapons/objects/SQLWeapons.php');
class TemplateWeaponsAdministration extends SQLWeapons
{
    public function formCreatWeaponByAdmin ($typeOfWeapon, $idNav) {
        $adressCreat = [75, 76, 77];
        print_r($this->weaponTypes[$typeOfWeapon]);
    }
}
