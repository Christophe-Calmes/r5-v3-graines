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
    public function formAddArmyList ($idNav) {
        echo '<form class="customerForm" action="'.encodeRoutage(121).'" method="post" enctype="multipart/form-data">';
        echo '<h3>Nouveau véhicule</h3>';
        echo '<label for="nameArmyList">Nom</label>';
        echo '<input id="nameArmyList" name="nameArmyList" placeholder="Nom de votre liste"/>';
        $ownerFactions = new TemplateWeaponsPublic ();
        $ownerFactions->factionSelect ();
        $this->globalSelect ('Escarmouche', 'skirmich', $this->yes, 'name');
        echo ' <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Créer</button>';
        echo '</form>';
    }   
}
