<?php
require('sources/armyList/objets/sqlArmyList.php');
require ('sources/weapons/objects/TemplateWeaponsPublic.php');
class TemplateAmyList extends SQLArmyList 
{
    private function globalSelect ($label, $fields, $array, $nameFields) {
        echo '<div class="flex-rows">';
            echo '<label class="labelFirstLetter" for="'.$fields.'">'.$label.'</label>';
            echo '<select id="'.$fields.'"name="'.$fields.'">';
                foreach ($array as $value) {
                    echo '<option value="'.$value['id'].'">'.$value[$nameFields].'</option>';
                }
            echo '</select>';
        echo '</div>';
    }
    private function getArray ($array, $index, $exitValue) {
        $index = $index - 1;
        return $array[$index][$exitValue];
    }
    public function formAddArmyList ($idNav) {
        echo '<form class="customerForm" action="'.encodeRoutage(121).'" method="post" enctype="multipart/form-data">';
        echo '<h3>Nouvelle compagnie</h3>';
        echo '<label for="nameArmyList">Nom</label>';
        echo '<input id="nameArmyList" name="nameArmyList" placeholder="Nom de votre liste"/>';
        $ownerFactions = new TemplateWeaponsPublic ();
        $ownerFactions->factionSelect ();
        $this->globalSelect ('Escarmouche', 'skirmich', $this->yes, 'name');
        echo ' <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Créer</button>';
        echo '</form>';
    }
    public function ArmyListOfOneFaction ($idFaction) {
        $dataList = $this->getArmyListOfOneFaction ($idFaction);
        if(!empty($dataList)) {
            echo '<h3>Liste des compagnies</h3>';
            echo '<article class="flex-center">';
            echo '<table  class="tableWebSite">';
             echo '<tr>';
                echo '<th>Nom</th>';
                echo '<th>Escarmouche</th>';
                echo '<th>Nombre de figurine</th>';
                echo '<th>Nombre de véhicule</th>';
                echo '<th>Prix</th>';
                echo '<th>Administration</th>';
                echo '<th>Effacer</th>';
             echo '</tr>';
             foreach ($dataList as $value) {
                echo '<tr>';
                    echo '<td>'.$value['nameArmyList'].'</td>';
                    echo '<td>'.$this->getArray ($this->yes, $value['skirmich'], 'name') .'</td>';
                    echo '<td>'.$this->numbreOfMiniature ($value['id']).'</td>';
                    echo '<td>'.$this->numbreOfVehicle ($value['id']).'</td>';
                    echo '<td>'.$this->listPrice ($value['id']).'</td>';
                    echo '<td>Administration</td>';
                    echo '<td>Effacer</td>';
             echo '</tr>';
             }
             echo '</table>'; 
        } else {
            echo '<article><a href="'.findTargetRoute(198).'">Ajouter une compagnie</a></article>';
        }
    } 
}
