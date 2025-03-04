<?php
class SQLAdministration 
{
    protected function getAllMiniaturePicture () {
    
    }
    public function nbrMiniaturePicture () {
        $select = "SELECT COUNT(`id`) AS `nbrMiniature` FROM `miniatures`";
        return ActionDB::select($select, [], 1)[0]['nbrMiniature'];
    }
}
