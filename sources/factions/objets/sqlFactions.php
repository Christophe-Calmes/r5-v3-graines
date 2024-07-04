<?php
require ('sources/univers/objets/templateUnivers.php');
class SQLFactions extends TemplateUnivers
{
    public function getUserFaction () {
        $idUser = new Controles ();
        $idAuthor =  $idUser->idUser($_SESSION);
        $select = "SELECT `factions`.`id` AS `idFaction`, `nomFaction`, 	`nameUnivers`, `nt`
        FROM `factions`
        INNER JOIN `univers` ON `univers`.`id` = `factions`.`idUnivers`
        WHERE `factions`.`idAuthor` = :idAuthor AND `factions`.`valid` = 1
        ORDER BY `nameUnivers`, `nomFaction`;";
        $param = [['prep'=>':idAuthor', 'variable'=>$idAuthor]];
        return ActionDB::select($select, $param, 1);
    }
}
