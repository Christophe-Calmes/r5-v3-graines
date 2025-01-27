<?php
require ('sources/vehicles/objets/SQLvehicles.php');
require ('sources/weapons/objects/TemplateWeaponsPublic.php');
class TemplatesVehicles extends SQLvehicles 
{
    private function movingSolveVehicle ($move) {
        return [$move, round($move * 2)];
    }
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
    public function formAddVehicle ($idNav) {
        // encodeRoutage(108)
        $factionMiniature = new TemplateWeaponsPublic ();
        echo '<form class="customerForm" action="'.encodeRoutage(108).'" method="post" enctype="multipart/form-data">';
        echo '<h3>Creat new vehicle</h3>';
        $factionMiniature->factionSelect ();
        echo '<label for="nameVehicle">MiniaturVehicle name :</label>';
        echo '<input id="nameVehicle" name="nameVehicle" placeholder="Vehicle name"/>';
        $this->globalSelect ('Martial quality dice', 'dqm', $this->dice, 'nameDice');
        $this->globalSelect ('Combat dice', 'dc', $this->dice, 'nameDice');
        $this->globalSelect ('Save / D6', 'armor',    $this->armour, 'nameArmour');
        $this->globalSelect('Structure point', 'structurePoint', $this->structurePoint, 'Structure');
        $this->globalSelect('Size of vehicle', 'sizeVehicle', $this->sizeVehicle, 'NameSize');
        $this->globalSelect('type of vehicle', 'typeVehicle', $this->typeVehicle, 'NameType');
        echo '<label for="move">Vehicle tactical move :</label>';
        echo '<input type="range" id="move" value="4" name="moving" min="0" max="18" step="1" oninput="updateRangeValue()"/>';
        echo '<div>Move : <span id="moveValue">4</span> " / <span id="runValue">6</span> " + 1D6"</div>';
        echo '<script>
            const updateRangeValue = () => {
                let moveValue = document.getElementById("move").value;
                let arrayMove = moveValue
                document.getElementById("moveValue").textContent = moveValue;
                document.getElementById("runValue").textContent = Math.round(moveValue * 2);
            }
        </script>';
        $this->globalSelect ('Fligth', 'fligt', $this->yes, 'name');
        $this->globalSelect ('Stationnary fligth', 'stationnaryFligt', $this->yes, 'name');
  
   
        echo '<label for="picture">Picture of vehicle ?</label>';
        echo '<input id="picture" type="file" name="namePicture" accept="image/png, image/jpeg, image/webp"/>';
        echo ' <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Creat new miniature</button>';
        echo '</form>';
    }
    public function printListVehicle ($data, $idNav) {
        //$data = ['idFaction', 'valid', 'fix'];
        $dataVehicle = $this->getVehicle ($data);
        
        if(empty($dataVehicle)) {
            echo '<h4>No vehicle for this faction.</h4>';
            echo '<a href="'.findTargetRoute(193).'">AddVehicle</a>';
        } else {
            echo '<article class="flex-center">';
            echo '<table  class="tableWebSite">';
             echo '<tr>';
                echo '<th>Fix</th>';
                echo '<th>Name</th>';
                echo '<th>Type</th>';
                echo '<th>Miniature size</th>';
                echo '<th>Quality martial dice</th>';
                echo '<th>Combat dice</th>';
                echo '<th>Move</th>';
                echo '<th>Fligth</th>';
                echo '<th>Healt Point</th>';
                echo '<th>Armor</th>';
                echo '<th>Price</th>';
                echo '<th>Administration</th>';
                echo '<th>Delete</th>';
             echo '</tr>';
            foreach($dataVehicle as $value) {
                $moving = $this->movingSolveVehicle($value['moving']);
                echo '<tr>';
                switch ($value['fix']) {
                    case 0:
                        echo '<td>
                        <form action="'.encodeRoutage(109).'" method="post">
                        <input type="hidden" name="idMiniature" value="'.$value['id'].'"/>
                        <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Fix</button>
                        </form>
                    </td>';
                        break;
                    case 1:
                        echo '<td>
                        <form action="'.encodeRoutage(109).'" method="post">
                        <input type="hidden" name="idMiniature" value="'.$value['id'].'"/>
                        <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Unfix</button>
                        </form>
                    </td>';
                        break;
             
                }

                echo '</tr>';
            }


             echo '</table>';
             echo '</article>';
             print_r($dataVehicle);
        }
     

    }

}
