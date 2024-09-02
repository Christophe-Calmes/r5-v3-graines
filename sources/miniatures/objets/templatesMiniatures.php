<?php
require('sources/miniatures/objets/sqlMiniatures.php');
class templatesMiniatures extends sqlMiniatures
{
    private function globalSelect ($label, $fields, $array, $nameFields) {
        echo '<div class="flex-rows">';
            echo '<label class="labelFirstLetter" for="'.$fields.'">'.$label.' :</label>';
            echo '<select id="'.$fields.'"name="'.$fields.'">';
                foreach ($array as $value) {
                    echo '<option value="'.$value['id'].'">'.$value[$nameFields].'</option>';
                }
            echo '</select>';
        echo '</div>';
    }
    public function miniatureForm () {
       //SELECT `nameMiniature`, `dc`, `dqm`, `move`, `fligt`, `stationnaryFligt`, `miniatureSize`, `typeTroop`, `armor`, `healtPoint`, `price`, `namePicture`, `valid` 
    $this->globalSelect ('Martial quality dice', 'dqm', $this->dice, 'nameDice');
    $this->globalSelect ('Combat dice', 'dc', $this->dice, 'nameDice');
    $this->globalSelect ('Healt point', 'healtPoint', $this->healtPoint, 'healtPoint');
    $this->globalSelect ('Save', 'armor',    $this->armour, 'nameArmour');
    }
}

