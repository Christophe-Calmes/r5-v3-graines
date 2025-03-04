<?php
class SQLAdministration 
{
    protected function getAllMiniaturePictureOfOnePage ($firstPage, $nbrPicture) {
        $select = "SELECT `id`, `namePicture`, `nom`, `prenom`, `login`
        FROM `miniatures`
        INNER JOIN `xgyd0647_techr5`.`users` ON `idAuthor` = `xgyd0647_techr5`.`users`.`idUser`
        ORDER BY `id` LIMIT {$firstPage}, {$nbrPicture};";
        return ActionDB::select($select, [], 1);
    }
    protected function getAllVehiclesPictureOfOnePage ($firstPage, $nbrPicture) {
        $select = "SELECT `id`, `namePicture`, `nom`, `prenom`, `login`
        FROM `vehicle`
        INNER JOIN `xgyd0647_techr5`.`users` ON `idAuthor` = `xgyd0647_techr5`.`users`.`idUser`
        ORDER BY `id` LIMIT {$firstPage}, {$nbrPicture};";
        return ActionDB::select($select, [], 1);
    }

    public function nbrMiniaturePicture () {
        $select = "SELECT COUNT(`id`) AS `nbrMiniature` FROM `miniatures`";
        return ActionDB::select($select, [], 1)[0]['nbrMiniature'];
    }
    public function nbrVehiclePicture () {
        $select = "SELECT COUNT(`id`) AS `nbrVehicle` FROM `vehicle`";
        return ActionDB::select($select, [], 1)[0]['nbrVehicle'];
    }
    public function deleteMiniatureByAdmin($param) {
        $select = "SELECT `namePicture` FROM `miniatures` WHERE `id` = :idMiniature;";
        $namePicture = ActionDB::select($select, $param, 1)[0]['namePicture'];
        $delete = "DELETE FROM `miniatures` WHERE `id` = :idMiniature;
        DELETE FROM `miniatureLinkWeapons` WHERE `idminiature` = :idMiniature;
        DELETE FROM `miniatureLinkSpecialRules` WHERE `idMiniature` = :idMiniature;
        DELETE FROM `armyListLinkMiniature` WHERE `idminiature` = :idMiniature;";
        ActionDB::access($delete, $param, 1);
        return $namePicture;
    }
    public function deleteVehicleByAdmin($param) {
        $select = "SELECT `namePicture` FROM `vehicle` WHERE `id` = :idVehicle;";
        $namePicture = ActionDB::select($select, $param, 1)[0]['namePicture'];
        $delete="DELETE FROM `vehicle` WHERE `id` = :idVehicle;
                DELETE FROM `vehicleLinkSpecialRules` WHERE `idVehicle` = :idVehicle;
                DELETE FROM `vehicleLinkWeapon` WHERE `idVehicle` = :idVehicle;
                DELETE FROM `armyListLinkVehicle` WHERE `idVehicle`=:idVehicle;";
        ActionDB::access($delete, $param, 1);
        return  $namePicture;
    }
}
