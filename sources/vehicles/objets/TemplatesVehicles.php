<?php
require ('sources/vehicles/objets/SQLvehicles.php');
require ('sources/weapons/objects/TemplateWeaponsPublic.php');
require ('sources/specialRules/objects/TemplatesSpecialRules.php');
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
        echo '<div>Move : <span id="moveValue">4</span> " / <span id="runValue">8</span> " + 1D6"</div>';
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
    private function fixVehicleDataSheet ($idVehicle, $idNav) {
        echo '<form class="flex-center" action="'.encodeRoutage(113).'" method="post">
        <input type="hidden" name="idVehicle" value="'.$idVehicle.'"/>
        <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Fix</button>
        </form>';
    }
    private function equiqVehicleDataSheet ($idVehicle, $idNav) {
        echo '<form class="flex-center" action="'.encodeRoutage(115).'" method="post">
        <input type="hidden" name="idVehicle" value="'.$idVehicle.'"/>
        <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Equip weapon</button>
        </form>';
    }
    protected function formUpdateOneVehicle ($data, $idNav) {
        $factionMiniature = new TemplateWeaponsPublic ();
        //$this->fixVehicleDataSheet ($data['id'], $idNav);
        echo '<form class="customerForm"  action="'.encodeRoutage(110).'" method="post" enctype="multipart/form-data">';
        echo '<h3>Update '.$data['nameVehicle'].' vehicle</h3>';
        $factionMiniature->factionSelected ($data['idFaction']); 
        echo '<label for="nameVehicle">MiniaturVehicle name :</label>';
        echo '<input id="nameVehicle" name="nameVehicle" value="'.$data['nameVehicle'].'"/>';
        $this->globalSelected ('Martial quality dice', 'dqm', $this->dice, 'nameDice', $data['dqm']);
        $this->globalSelected ('Combat dice', 'dc', $this->dice, 'nameDice', $data['dc']);
        $this->globalSelected ('Save / D6', 'armor',    $this->armour, 'nameArmour', $data['armor']);
        $this->globalSelected ('Structure point', 'structurePoint', $this->structurePoint, 'Structure', $data['structurePoint']);
        $this->globalSelected ('Size of vehicle', 'sizeVehicle', $this->sizeVehicle, 'NameSize', $data['sizeVehicle']);
        $this->globalSelected ('type of vehicle', 'typeVehicle', $this->typeVehicle, 'NameType', $data['typeVehicle']);
        echo '<label for="move">Vehicle tactical move :</label>';
        echo '<input type="range" id="move" value="'.$data['moving'].'" name="moving" min="0" max="18" step="1" oninput="updateRangeValue()"/>';
        echo '<div>Move : <span id="moveValue">'.$data['moving'].'</span> " / <span id="runValue">'.$this->movingSolveVehicle ($data['moving'])[1].'</span> " + 1D6"</div>';
        echo '<script>
            const updateRangeValue = () => {
                let moveValue = document.getElementById("move").value;
                let arrayMove = moveValue
                document.getElementById("moveValue").textContent = moveValue;
                document.getElementById("runValue").textContent = Math.round(moveValue * 2);
            }
        </script>';
        $this->globalSelected ('Fligth', 'fligt', $this->yes, 'name', $data['fligt']);
        $this->globalSelected ('Stationnary fligth', 'stationnaryFligt', $this->yes, 'name', $data['stationnaryFligt']);
        echo '<label for="picture">Picture of vehicle ?</label>';
        echo '<input id="picture" type="file" name="namePicture" accept="image/png, image/jpeg, image/webp"/>';
        echo '<input type="hidden" name="idVehicle" value="'.$data['id'].'"/>';
        echo ' <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Creat new miniature</button>';
        echo '</form>';
        
        
    }
    private function getArray ($array, $index, $exitValue) {
        $index = $index - 1;
        return $array[$index][$exitValue];
    }
    private function formDeleteVehicleByOwner ($idVehicle, $idNav) {
       echo '<td><form action="'.encodeRoutage(114).'" method="post">
                        <input type="hidden" name="idVehicle"  value="'.$idVehicle.'"/>
                        <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Delete</button>
                        </form></td>';
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
                echo '<th>Vehicle size</th>';
                echo '<th>Quality martial dice</th>';
                echo '<th>Combat dice</th>';
                echo '<th>Move</th>';
                echo '<th>Fligth</th>';
                echo '<th>Stationnary fligth</th>';
                echo '<th>Armor</th>';
                echo '<th>Structure Point</th>';
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
                        <input type="hidden" name="idVehicle" value="'.$value['id'].'"/>
                        <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Fix</button>
                        </form>
                    </td>';
                        break;
                    case 1:
                        echo '<td>
                        <form action="'.encodeRoutage(109).'" method="post">
                        <input type="hidden" name="idVehicle"  value="'.$value['id'].'"/>
                        <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Unfix</button>
                        </form>
                    </td>';
                        break;
                    case 2:
                        echo '<td>
                        <form action="'.encodeRoutage(109).'" method="post">
                        <input type="hidden" name="idVehicle"  value="'.$value['id'].'"/>
                        <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Unequip</button>
                        </form>
                    </td>';
             
                }
                echo '<td>'.$value['nameVehicle'].'</td>';
                echo '<td>'.$this->getArray($this->typeVehicle, $value['typeVehicle'], 'NameType').'</td>';
                echo '<td>'.$this->getArray($this->sizeVehicle, $value['sizeVehicle'], 'NameSize').'</td>';
                echo '<td>'.$this->getArray($this->dice, $value['dqm'], 'nameDice').'</td>';
                echo '<td>'.$this->getArray($this->dice, $value['dc'], 'nameDice').'</td>';
                echo '<td>'.$moving[0].'" / '.$moving[1].'" + 1D4 </td>';
                echo '<td>'.$this->getArray($this->yes, $value['fligt'], 'name').'</td>';
                echo '<td>'.$this->getArray($this->yes, $value['stationnaryFligt'], 'name').'</td>';
                echo '<td>'.$this->getArray($this->armour, $value['armor'], 'nameArmour').'</td>';
                echo '<td>'.$this->getArray($this->structurePoint, $value['structurePoint'], 'Structure').'</td>';
                echo '<td>'.$value['price'].' $</td>';
                echo '<td><a href="'.findTargetRoute(196).'&idVehicle='.$value['id'].'">Update vehicle</a></td>';
                $this->formDeleteVehicleByOwner ($value['id'], $idNav);
                echo '</tr>';
            }
             echo '</table>';
             echo '</article>';
        }
    }
    private function listVehicleChoiceGlobalWeapon ($idVehicle, $idNav) {
        $listWeapon = new TemplateWeaponsPublic ();
        echo '<h2>Global Weapon</h2>';
        echo ' <article class="flex-colonne-form">';
            echo '<details>';
            echo '<summary class="titleSite">
            Close combat weapon
         
            </summary>
                 <h4>List Close combat weapon</h4>';
                 $listWeapon->listWeaponForChoiceUserGlobal (0, $idVehicle, $idNav, true);
            echo '</details>';
        echo '</article>';
        echo ' <article class="flex-colonne-form">';
            echo '<details>';
            echo '<summary class="titleSite">
            Shooting weapon
         
            </summary>
                 <h4>List shooting weapon</h4>';
                 $listWeapon->listWeaponForChoiceUserGlobal (1, $idVehicle, $idNav, true);
            echo '</details>';
        echo '</article>';
        echo ' <article class="flex-colonne-form">';
        echo '<details>';
        echo '<summary class="titleSite">
        Explosive weapon
     
        </summary>
             <h4>List explosive weapon</h4>';
             $listWeapon->listWeaponForChoiceUserGlobal (2, $idVehicle, $idNav, true);
        echo '</details>';
    echo '</article>';
    }
    private function listVehicleChoiceFactionWeapon ($idVehicle, $idNav, $idFaction)  {
        $listWeapon = new TemplateWeaponsPublic ();
        echo '<h2>Faction Weapon</h2>';
        $weaponName = ['combat weapon', 'Shooting weapon',  'Explosive weapon'];
        for ($i=0; $i <=2 ; $i++) { 
            echo ' <article class="flex-colonne-form">';
            echo '<details>';
            echo '<summary class="titleSite">
            '.$weaponName[$i].' weapon
            </summary>
                    <h4>List '.$weaponName[$i].' weapon</h4>';
                    $listWeapon->listWeaponFactionForChoiseUser ($i, $idVehicle, $idFaction, $idNav, true);
                echo '</details>';
            echo '</article>';
        }
      
     
    }


    public function printOneVehicle ($idVehicle, $idNav) {
        $dataVehicle = $this->getOneVehicle ($idVehicle);
        $dataVehicle = $dataVehicle[0];
        $moving = $this->movingSolveVehicle($dataVehicle['moving']);
        echo '<article class="flex-center">';
        echo '<table  class="tableWebVehicle">';
        echo '<caption><h4>'.$dataVehicle['nameVehicle'].'</h4></caption>';
         echo '<tr rowspan="2">';
            echo '<td colspan="4">
            <img class="imgCarouselAuto" src="sources/pictures/miniaturesPictures/'.$dataVehicle['namePicture'].'" alt="'.$dataVehicle['nameVehicle'].'"/></td>';
        echo '</tr>';
        if($dataVehicle['fix'] == 0) {
            echo '<tr>';
                echo '<td colspan="3">';
                    $this->fixVehicleDataSheet ($dataVehicle['id'], $idNav);
                    $this->formDeleteVehicleByOwner ($dataVehicle['id'], $idNav);
                echo '</td>';
            echo '</tr>';
        }
        if($dataVehicle['fix']==1) {
            echo '<tr>';
            echo '<td colspan="3">';
                $this->equiqVehicleDataSheet ($dataVehicle['id'], $idNav);
                $this->formDeleteVehicleByOwner ($dataVehicle['id'], $idNav);
            echo '</td>';
        echo '</tr>';
        }
        echo '<tr>';
           
            echo '<td>DQM : '.$this->getArray($this->dice, $dataVehicle['dqm'], 'nameDice').'</td>';
            echo '<td>DC : '.$this->getArray($this->dice, $dataVehicle['dc'], 'nameDice').'</td>';
            echo '<td colspan="2">Price : '.$dataVehicle['price'].' $<br/>
                        Type : '.$this->getArray($this->typeVehicle, $dataVehicle['typeVehicle'], 'NameType').'</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>
                    <ul>
                        <li>Move : '.$moving[0].'" / '.$moving[1].' " + 1D4"</li>
                        <li>Fligth :  '.$this->getArray($this->yes, $dataVehicle['fligt'], 'name').'</li>
                        <li>Stationnary fligth : '.$this->getArray($this->yes, $dataVehicle['stationnaryFligt'], 'name').'</li>
                    </ul>
                </td>';
            echo '<td>Structure : '.$this->getArray($this->structurePoint, $dataVehicle['structurePoint'], 'Structure').'</td>';
            echo '<td colspan="2">Svg : '.$this->getArray($this->armour, $dataVehicle['armor'], 'nameArmour').'</td>';
          
         echo '</tr>';
        echo '</table>';
        echo '</article>';
        echo '<article>';
        if($dataVehicle['fix'] == 0) {
            $this->formUpdateOneVehicle ($dataVehicle, $idNav);
        }  
        echo '</article>';
        if($dataVehicle['fix'] == 1) {
            $SR = new TemplatesSpecialRules ();
            $SR->displayAssignedSRforVehicle ($dataVehicle['id'], $idNav);
            $SR->displaySRforVehicle ($dataVehicle['id'], $idNav);
            
        }
        if($dataVehicle['fix'] == 2) {
            $this->listVehicleChoiceGlobalWeapon ($dataVehicle['id'], $idNav);
            $this->listVehicleChoiceFactionWeapon ($dataVehicle['id'], $idNav, $dataVehicle['idFaction']);
        }
    }


}
