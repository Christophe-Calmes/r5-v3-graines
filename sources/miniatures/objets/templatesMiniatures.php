<?php
require('sources/miniatures/objets/sqlMiniatures.php');
require ('sources/weapons/objects/TemplateWeaponsPublic.php');
require ('sources/specialRules/objects/TemplatesSpecialRules.php');
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
    private function globalSelected ($label, $fields, $array, $nameFields, $selected) {
    
        echo '<div class="flex-rows">';
            echo '<label class="labelFirstLetter" for="'.$fields.'">'.$label.' :</label>';
            echo '<select id="'.$fields.'"name="'.$fields.'">';
               foreach ($array as $value) {
                if($selected == $value['id']) {
                    echo '<option value="'.$value['id'].'" selected>'.$value[$nameFields].'</option>';
                } else {
                    echo '<option value="'.$value['id'].'">'.$value[$nameFields].'</option>';
                }
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
    echo '<input id="nameMiniature" name="nameMiniature" placeholder="Miniature name "/>';
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
             foreach ($dataMiniature as $value) {
                $moving = $this->movingSolve ($value['moving']);
                echo '<tr>';
                switch ($value['stick']) {
                    case 0:
                        echo '<td>
                        <form action="'.encodeRoutage(100).'" method="post">
                        <input type="hidden" name="idMiniature" value="'.$value['id'].'"/>
                        <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Fix</button>
                        </form>
                    </td>';
                    break;
                    case 1:
                        echo '<td>
                        <form action="'.encodeRoutage(100).'" method="post">
                        <input type="hidden" name="idMiniature" value="'.$value['id'].'"/>
                        <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Unfix</button>
                        </form>
                    </td>';
                    break;
                }
                  
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
                    echo '<td>'.round($value['price']).' k$</td>';
                    echo '<td><a href="'.findTargetRoute(188).'&idMiniature='.$value['id'].'">Update miniature</a></td>';
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
    public function displayMiniatureOfOneFactionInService ($idFaction, $valid, $idNav) {
        $dataMiniature = $this->getMiniatureOfOneFactionInService ($idFaction, $valid);
        
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
                echo '<th>View</th>';
                echo '<th>Update</th>';
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
                    echo '<td>'.round($value['price']).' k$</td>';
                    echo '<td><a href="'.findTargetRoute(188).'&idMiniature='.$value['id'].'">View datasheet</a></td>';
                    echo '<td>
                        <form action="'.encodeRoutage(107).'" method="post">
                        <input type="hidden" name="idMiniature" value="'.$value['id'].'"/>
                        <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Out of service</button>
                        </form>
                    </td>';
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
        } else {
            echo '<h4>No miniature in service</h4>';
        }
        
        echo '<article><a href="'.findTargetRoute(185).'">Add news miniature</a></article>';
        
    }
    public function displayOneMiniature ($idMiniature, $valid, $stick) {
        $dataMiniature = $this->getOneMiniature ($idMiniature, $valid, $stick);
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
                $printSpecialRules = new TemplatesSpecialRules ();
                $printSpecialRules->displaySpecialRules ($dataMiniature['idMiniature'], 1);
            echo '</article>';
        } else {
            echo '<article><a href="'.findTargetRoute(185).'">Add news miniature</a></article>';
        }
       
    }
    public function updateMiniatureByUser ($idMiniature, $valid, $idNav, $stick) {
        $data =  $this->getOneMiniature ($idMiniature, $valid, $stick);
        $data = $data[0];
        $factionMiniature = new TemplateWeaponsPublic ();
        echo '<form class="customerForm" action="'.encodeRoutage(99).'" method="post" enctype="multipart/form-data">';
        echo '<h3>Update miniature : '.$data['nameMiniature'].'</h3>';
        $factionMiniature->factionSelected ($data['idFaction']); 
        echo '<label for="nameMiniature">Miniature name :</label>';
        echo '<input id="nameMiniature" name="nameMiniature" value="'.$data['nameMiniature'].'"/>';
        echo '<label for="move">Miniature tactical move :</label>';
        echo '<input type="range" id="move" value="'.$data['moving'].'" name="moving" min="0" max="18" step="1" oninput="updateRangeValue()"/>';
        echo '<div>Move : <span id="moveValue">'.$data['moving'].'</span> " / <span id="runValue">'.round($data['moving']*1.45).'</span> " + 1D4"</div>';
        echo '<script>
            const updateRangeValue = () => {
                let moveValue = document.getElementById("move").value;
                let arrayMove = moveValue
                document.getElementById("moveValue").textContent = moveValue;
                document.getElementById("runValue").textContent = Math.round(moveValue * 1.45);
            }
        </script>';
        $this->globalSelected ('Martial quality dice', 'dqm', $this->dice, 'nameDice', $data['dqm']);
        $this->globalSelected ('Combat dice', 'dc', $this->dice, 'nameDice', $data['dc']);
        $this->globalSelected ('Healt point', 'healtPoint', $this->healtPoint, 'healtPoint', $data['healtPoint']);
        $this->globalSelected ('Save / D6', 'armor', $this->armour, 'nameArmour', $data['armor']);
        $this->globalSelected ('Type of troop', 'typeTroop', $this->typesTroupe, 'nameTroupe', $data['typeTroop']);
        $this->globalSelected ('Miniature size', 'miniatureSize', $this->miniatureSize, 'NameSize', $data['miniatureSize']);
        $this->globalSelected ('Fligth', 'fligt', $this->yes, 'name', $data['fligt']);
        $this->globalSelected ('Stationnary fligth', 'stationnaryFligt', $this->yes, 'name', $data['stationnaryFligt']);
        echo '<input type="hidden" name="idMiniature" value="'.$data['idMiniature'].'"/>';
        echo ' <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Update miniature</button>';
        echo '</form>';
        echo '<form action="'.encodeRoutage(103).'" method="post">
                <input type="hidden" name="idMiniature" value="'.$data['idMiniature'].'"/>
                <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Fix</button>
            </form>';
    }
    public function goodForService ($idMiniature, $idNav) {
        echo '<form action="'.encodeRoutage(106).'" method="post">
                <input type="hidden" name="idMiniature" value="'.$idMiniature.'"/>
                <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Good for service</button>
            </form>';
    }

}

