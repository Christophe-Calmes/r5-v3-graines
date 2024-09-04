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
    public function miniatureForm ($idNav) {
    echo '<form class="customerForm" action="'.encodeRoutage(96).'" method="post" enctype="multipart/form-data">';
    echo '<h3>Creat new miniature</h3>';
    echo '<label for="nameMiniature">Miniature name :</label>';
    echo '<input id="nameMiniature" name="nameMiniature" placeholder="Name miniature"/>';
    echo '<label for="move">Miniature tactical move :</label>';
    echo '<input type="range" id="move" value="4" name="move" min="0" max="18" step="1" oninput="updateRangeValue()"/>';
    echo '<div>Move : <span id="moveValue">4</span> " / <span id="runValue">6</span> " + 1D4"</div>';
    echo '<script>
        const updateRangeValue = () => {
            let moveValue = document.getElementById("move").value;
            let arrayMove = moveValue
            document.getElementById("moveValue").textContent = moveValue;
            document.getElementById("runValue").textContent = Math.round(moveValue * 1.45);
        }
    </script>';
    $this->globalSelect ('Martial quality dice', 'dqm', $this->dice, 'nameDice');
    $this->globalSelect ('Combat dice', 'dc', $this->dice, 'nameDice');
    $this->globalSelect ('Healt point', 'healtPoint', $this->healtPoint, 'healtPoint');
    $this->globalSelect ('Save / 1D10', 'armor',    $this->armour, 'nameArmour');
    $this->globalSelect ('Type of troop', 'typeTroop', $this->typesTroupe, 'nameTroupe');
    $this->globalSelect ('Miniature size', 'miniatureSize', $this->miniatureSize, 'NameSize');
    $this->globalSelect ('Fligth', 'fligt', $this->yes, 'name');
    $this->globalSelect ('Stationnary fligth', 'stationnaryFligt', $this->yes, 'name');
    echo '<label for="picture">Picture of miniature ?</label>';
    echo '<input id="picture" type="file" name="namePicture" accept="image/png, image/jpeg, image/webp"/>';
    echo ' <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Creat new miniature</button>';
    echo '</form>';
    }
}

