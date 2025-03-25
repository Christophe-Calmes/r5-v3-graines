<?php
class GetDataSite {

    public function getElementSite($fields, $tables, $conditionsClause) {
        $select = "SELECT `description`, `titreHTML`, `titre`, `sousTitre` FROM `dataSite`";
        return ActionDB::select($select, []);
    }
}
