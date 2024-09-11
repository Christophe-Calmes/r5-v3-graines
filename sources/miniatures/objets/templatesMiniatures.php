<?php
require('sources/miniatures/objets/sqlMiniatures.php');
require ('sources/weapons/objects/TemplateWeaponsPublic.php');
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
    private function getArray ($array, $index, $exitValue) {
        $index = $index - 1;
        return $array[$index][$exitValue];
    }
    public function miniatureForm ($idNav) {
    $factionMiniature = new TemplateWeaponsPublic ();
    echo '<form class="customerForm" action="'.encodeRoutage(96).'" method="post" enctype="multipart/form-data">';
    echo '<h3>Creat new miniature</h3>';
    $factionMiniature->factionSelect (); 
    echo '<label for="nameMiniature">Miniature name :</label>';
    echo '<input id="nameMiniature" name="nameMiniature" placeholder="Name miniature"/>';
    echo '<label for="move">Miniature tactical move :</label>';
    echo '<input type="range" id="move" value="4" name="moving" min="0" max="18" step="1" oninput="updateRangeValue()"/>';
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
    $this->globalSelect ('Save / D6', 'armor',    $this->armour, 'nameArmour');
    $this->globalSelect ('Type of troop', 'typeTroop', $this->typesTroupe, 'nameTroupe');
    $this->globalSelect ('Miniature size', 'miniatureSize', $this->miniatureSize, 'NameSize');
    $this->globalSelect ('Fligth', 'fligt', $this->yes, 'name');
    $this->globalSelect ('Stationnary fligth', 'stationnaryFligt', $this->yes, 'name');
    echo '<label for="picture">Picture of miniature ?</label>';
    echo '<input id="picture" type="file" name="namePicture" accept="image/png, image/jpeg, image/webp"/>';
    echo ' <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Creat new miniature</button>';
    echo '</form>';
    }
    private function movingSolve ($move) {
        return [$move, round($move *1.45)];
    }
    public function displayMiniatureOfOneFaction ($idFaction, $valid, $idNav) {
        $dataMiniature = $this->getMiniatureOfOneFaction ($idFaction, $valid);
        if(!empty($dataMiniature)) {
            echo '<article class="flex-center">';
            echo '<table  class="tableWebSite">';
             echo '<tr>';
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
                echo '<th>Clone</th>';
                echo '<th>Delete</th>';
             echo '</tr>';
             foreach ($dataMiniature as $value) {
                $moving = $this->movingSolve ($value['moving']);
                echo '<tr>';
                    echo '<td>'.$value['nameMiniature'].'</td>';
                    echo '<td>'.$this->getArray ($this->miniatureSize, $value['miniatureSize'], 'NameSize') .'</td>';
                    echo '<td>'.$this->getArray ($this->typesTroupe, $value['typeTroop'], 'nameTroupe') .'</td>';
                    echo '<td>'.$this->getArray ($this->dice, $value['dqm'], 'nameDice') .'</td>';
                    echo '<td>'.$this->getArray ($this->dice, $value['dc'], 'nameDice') .'</td>';
                    echo '<td>'. $moving[0].'"/ '.$moving[1].'" + 1d4"</td>';
                    echo '<td>'.$this->getArray ($this->yes, $value['fligt'], 'name') .'
                    / Stationnary : '.$this->getArray ($this->yes, $value['stationnaryFligt'], 'name') .'</td>';
                    echo '<td>'.$this->getArray ($this->healtPoint, $value['healtPoint'], 'healtPoint') .'</td>';
                    echo '<td>'.$this->getArray ( $this->armour, $value['armor'], 'nameArmour') .'</td>';
                    echo '<td>'.round($value['price']).' $</td>';
                    echo '<td><a href="'.findTargetRoute(188).'&idMiniature='.$value['id'].'">Update miniature</a></td>';
                    echo '<td> <form action="'.encodeRoutage(98).'" method="post">
                        <input type="hidden" name="idMiniature" value="'.$value['id'].'"/>
                            <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Cloning</button>
                        </form></td>';
                    echo '<td>
                        <form action="'.encodeRoutage(97).'" method="post">
                        <input type="hidden" name="idMiniature" value="'.$value['id'].'"/>
                        <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Delete</button>
                        </form>
                    </td>';
             echo '</tr>';
             }
            echo '</table>';
            echo '</article>';
        }
        
        echo '<article><a href="'.findTargetRoute(185).'">Add news miniature</a></article>';
        
    }
    public function displayOneMiniature ($idMiniature, $valid) {
        $dataMiniature = $this->getOneMiniature ($idMiniature, $valid);
        $dataMiniature = $dataMiniature[0];
        $moving = $this->movingSolve ($dataMiniature['moving']);
        $bonus = null;
        $bonusSVG = null;
        if($dataMiniature['typeTroop']>3) {
            $bonus = '++';
        }
        if($dataMiniature['typeTroop']==5) {
            $bonusSVG = '+';
        }
        if(!empty($dataMiniature)) {
            echo '<article class="flex-colonne-center">';
                echo '<h1>'.$dataMiniature['nameUnivers'].' Faction : '.$dataMiniature['nomFaction'].'</h1>';
                echo '<h3>'.$dataMiniature['nameMiniature'].'</h3>';
                    echo '<table  class="tableCodex SRGrey">';
                        echo '<tr>';
                            echo '<td rowspan= 3><img class="webSitePicture" src="sources/pictures/miniaturesPictures/'.$dataMiniature['namePicture'].'" alt="'.$dataMiniature['nameMiniature'].'" /></td>';
                            echo '<td>Price : '.round($dataMiniature['price']).' $</td>';
                            echo '<td>Type : '.$this->getArray ($this->typesTroupe, $dataMiniature['typeTroop'], 'nameTroupe') .'</td>';
                            echo '<td>Name :'.$dataMiniature['nameMiniature'].'</td>';
                            echo '<td>Miniature size : '.$this->getArray ($this->miniatureSize, $dataMiniature['miniatureSize'], 'NameSize') .'</td>';
                        echo '</tr>';
                        echo '<tr>';
                            echo '<td class="blue">DQM : '.$this->getArray ($this->dice, $dataMiniature['dqm'], 'nameDice').$bonus.'</td>';
                            echo '<td class="red"> DC : '.$this->getArray ($this->dice, $dataMiniature['dc'], 'nameDice') .'</td>';
                            echo '<td class="orange">Healt point : '.$this->getArray ($this->healtPoint, $dataMiniature['healtPoint'], 'healtPoint') .'</td>';
                            echo '<td class="codexGrey">Armour save: '.$this->getArray ( $this->armour, $dataMiniature['armor'], 'nameArmour').$bonusSVG.' /1D6</td>';
                        echo '</tr>';
                        echo '<tr class="green">';
                            echo '<td>Tactical move : '.$moving[0].' "</td>';
                            echo '<td>Run : '.$moving[1].'" + 1D4"</td>'; 
                            echo '<td>Fligth : '.$this->getArray ($this->yes, $dataMiniature['fligt'], 'name') .'</td>';
                            echo '<td>Stationnary fligth : '.$this->getArray ($this->yes, $dataMiniature['stationnaryFligt'], 'name') .'</td>';
                        echo '</tr>';
                    echo '</table>';
            echo '</article>';

        } else {
            echo '<article><a href="'.findTargetRoute(185).'">Add news miniature</a></article>';
        }
       
    }
}

