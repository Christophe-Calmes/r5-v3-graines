<?php
class SQLWeapons 
{
    protected $weaponTypes;
    protected $gabaritTypes;
    protected $powerType;
    protected $yes;
    protected $blastDice;
    public function __construct () {
        $this->weaponTypes = ['Contact', 'Shoot', 'Explosive'];
        $this->gabaritType = ['small', 'medium', 'big', 'Blast'];
        $this->powerType = ['1D', '2D', '3D', '4D', '5D', '6D'];
        $this->blastDice = ['D4', 'D6', 'D8', 'D10', 'D12'];
        $this->yes = ['No', 'Yes'];
    }
    public function checkTypePower ($indexTypePower) {
        return array_key_exists($indexTypePower, $this->powerType);
    }
    public function checkGabaritType ($indexGabaritType) {
        return array_key_exists($indexGabaritType, $this->gabaritType);
    }
    public function checkBlastDice ($indexBlastDice) {
        return array_key_exists($indexBlastDice, $this->blastDice);
    }
    public function checkRateOfFire ($rtf) {
        if(($rtf >= 1)&&($rtf <= 12)) {
            return true;
        }
        return false;
    }
    public function checkRangeWeapon ($range) {
        if(($range >= 0)&&($range <= 120)) {
            return true;
        } 
        return false;
    }
    public function recordWeapon ($param) {
        $insert = "INSERT INTO `weapons`(`nameWeapon`, `idAuthor`,  `power`, `overPower`, `typeWeapon`, `heavy`, `spell`, `price`) 
        VALUES (:nameWeapon, :idUser,  :power, :overPower, :typeWeapon, :heavy, :spell, :price);";
        return ActionDB::access($insert, $param, 1);
    }
    public function recordWeaponShooting ($param) {
        $insert = "INSERT INTO `weapons`( `nameWeapon`, `idAuthor`, `power`, `overPower`, `typeWeapon`, `heavy`, `assault`, `saturation`, `rateOfFire`,  `rangeWeapon`, `spell`, `price`) 
        VALUES ( :nameWeapon, :idUser, :power, :overPower, :typeWeapon, :heavy, :assault, :saturation, :rateOfFire,  :rangeWeapon, :spell, :price);";
        return ActionDB::access($insert, $param, 1);
    }
    public function recordWeaponBlast ($param) {
        $insert = "INSERT INTO `weapons`( `nameWeapon`, `idAuthor`, `power`, `overPower`, `typeWeapon`, `heavy`, `assault`, `saturation`, `rateOfFire`,  `rangeWeapon`, `spell`, `templateType`, `blastDice`, `price`) 
        VALUES ( :nameWeapon, :idUser, :power, :overPower, :typeWeapon, :heavy, :assault, :saturation, :rateOfFire,  :rangeWeapon, :spell, :templateType, :blastDice, :price);";
        return ActionDB::access($insert, $param, 1);
    }
}
