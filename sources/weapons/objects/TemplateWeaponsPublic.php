<?php
require ('sources/weapons/objects/SQLWeapons.php');
require('sources/factions/objets/sqlFactions.php');
final class TemplateWeaponsPublic extends SQLWeapons

{
    public function factionSelect () {
        $FactionsUser = new SQLFactions ();
        $dataFactions = $FactionsUser->getUserFaction ();
        echo '<div class="flex-rows">';
            echo '<label class="labelFirstLetter" for="idFaction">Factions :</label>';
            echo '<select id="idFaction"name="idFaction">';
                foreach ($dataFactions as  $value) {
                    echo '<option value="'.$value['idFaction'].'">'.$value['nameUnivers'].' - '.$value['nomFaction'].' - LT'.$value['nt'].'</option>';
                }
            echo '</select>';
        echo '</div>';
    }
    public function factionSelected ($idFaction) {
        $FactionsUser = new SQLFactions ();
        $dataFactions = $FactionsUser->getUserFaction ();
        echo '<div class="flex-rows">';
            echo '<label class="labelFirstLetter" for="idFaction">Factions :</label>';
            echo '<select id="idFaction"name="idFaction">';
                foreach ($dataFactions as  $value) {
                    if($idFaction == $value['idFaction']) {
                        echo '<option value="'.$value['idFaction'].'" selected>'.$value['nameUnivers'].' - '.$value['nomFaction'].' - LT'.$value['nt'].'</option>';
                    } else {
                        echo '<option value="'.$value['idFaction'].'">'.$value['nameUnivers'].' - '.$value['nomFaction'].' - LT'.$value['nt'].'</option>';
                    }
                    
                }
            echo '</select>';
        echo '</div>';
    }
    private function globalSelect ($label, $fields, $array) {
        echo '<div class="flex-rows">';
            echo '<label class="labelFirstLetter" for="'.$fields.'">'.$label.' :</label>';
            echo '<select id="'.$fields.'"name="'.$fields.'">';
                for ($i=0; $i <count($array) ; $i++) { 
                    echo '<option value="'.$i.'">'.$array[$i].'</option>';
                }
            echo '</select>';
        echo '</div>';
    }

    private function globalSelected ($label, $fields, $array, $selected) {
        echo '<div class="flex-rows">';
            echo '<label class="labelFirstLetter" for="'.$fields.'">'.$label.' :</label>';
            echo '<select id="'.$fields.'"name="'.$fields.'">';
                for ($i=0; $i <count($array) ; $i++) { 
                    
                    if($selected == $i) {
                        echo '<option value="'.$i.'" selected>'.$array[$i].'</option>';
                    } else {
                        echo '<option value="'.$i.'">'.$array[$i].'</option>';
                    }
                }
            echo '</select>';
        echo '</div>';
    }
    private function textSR ($dataSRAssigned) {
        if(!empty($dataSRAssigned)) {
                echo '<table class="tableSpecialsRules green">';
            foreach ($dataSRAssigned as $value) {
                echo '<tr>';
                    echo '<td>Name : '.$value['nameSpecialRules'].'</strong></td>';
                echo '</tr>';
                echo '<tr>';
                        echo '<td colspan="2">'.$value['descriptionSpecialRules'].'</td>';
                    echo '</tr>';
                }
             echo '</table>';
 
        }
    }
    private function displayResumeSR ($idWeapon) {
        $dataSR = $this->getSpecialRuleOfOneWeapon ($idWeapon);
        $specialRules = null;
            foreach ($dataSR as $value) {
                $specialRules = $specialRules.$value['nameSpecialRules'].'.';
            }
        if(!empty($specialRules) ) {
            //echo '<strong>Special rules : '.substr($specialRules,0,-1).'</strong>';
            $this->textSR($dataSR);
        }
     
    }

    public function formCreatWeapon ($typeOfWeapon, $idNav) {
        
        $adressCreat = [82, 83, 84];
        echo '<article>';
        echo '<h4>'.$this->weaponTypes[$typeOfWeapon].' weapon</h4>';
            echo '<form class="customerForm" action="'.encodeRoutage($adressCreat[$typeOfWeapon]).'" method="post">';
                echo '<label class="labelFirstLetter" for="nameWeapon">Name of weapons</label>';
                echo '<input id="nameWeapon" name="nameWeapon" placeholder="Name of weapon"/>';
                $this->factionSelect ();
                $this->globalSelect ('Power of weapon','power', $this->powerType);
                $this->globalSelect('overPower ?', 'overPower',$this->yes);
                $this->globalSelect('Heavy weapon ?', 'heavy', $this->yes);
                $this->globalSelect('Spell ?', 'spell',$this->yes);
                if(($typeOfWeapon == 1)||($typeOfWeapon == 2)) {
                    $this->globalSelect('Assault weapon ?', 'assault',$this->yes);
                    $this->globalSelect('Saturation weapon ?', 'saturation',$this->yes);
                    echo '<label for="rateOfFire">Rate of fire :</label>';
                    echo '<input type="number" id="rateOfFire" name="rateOfFire" value="1" min="1" max="12"/>';
                    echo '<label for="rangeWeapon'.$typeOfWeapon.'">Weapon range :</label>';
                    echo '<input type="range" id="rangeWeapon'.$typeOfWeapon.'" value="10" name="rangeWeapon" min="0" max="120" step="2" oninput="updateRangeValue'.$typeOfWeapon.'()"/>';
                    echo '<div>Range max size : <span id="rangeValue'.$typeOfWeapon.'">10</span> "</div>';
                    echo '<script>
                        const updateRangeValue'.$typeOfWeapon.' = () => {
                            let rangeValue'.$typeOfWeapon.' = document.getElementById("rangeWeapon'.$typeOfWeapon.'").value;
                            document.getElementById("rangeValue'.$typeOfWeapon.'").textContent = rangeValue'.$typeOfWeapon.';
                        }
                    </script>';
                }
                if($typeOfWeapon == 2) {
                    $this->globalSelect('Blast Gabarit ?', 'templateType',$this->gabaritType);
                    $this->globalSelect('Blast dice ?', 'blastDice',$this->blastDice);
                }
            echo ' <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Creat weapon</button>';
            echo '</form>';
        echo '</article>';
       
    }
    public function formUpdateWeaponByUser ($idWeapon, $idNav) {
        $dataWeapon = $this->getOneWeaponByOwner ($idWeapon);
        $dataWeapon = $dataWeapon[0];
        $typeOfWeapon = $dataWeapon['typeWeapon'];
        $adressCreat = [92, 93, 94];
        echo '<article>';
            echo '<h3>Univers '.$dataWeapon['nameUnivers'].' Faction : '.$dataWeapon['nomFaction'].' </h3>';
         echo '<h4>Update : '.$this->weaponTypes[$dataWeapon['typeWeapon']].' weapon - '.$dataWeapon['nameWeapon'].'</h4>';
           echo '<form class="customerForm" action="'.encodeRoutage($adressCreat[$dataWeapon['typeWeapon']]).'" method="post">';
                 echo '<label class="labelFirstLetter" for="nameWeapon">Name of weapons</label>';
                echo '<input id="nameWeapon" name="nameWeapon" value="'.$dataWeapon['nameWeapon'].'"/>';
               
                $this->globalSelected ('Power of weapon','power', $this->powerType, $dataWeapon['power']);
                $this->globalSelected ('overPower ?', 'overPower',$this->yes, $dataWeapon['overPower']);
                $this->globalSelected ('Heavy weapon ?', 'heavy', $this->yes, $dataWeapon['heavy']);
                $this->globalSelected ('Spell ?', 'spell',$this->yes, $dataWeapon['spell']);
        
                if(($typeOfWeapon == 1)||($typeOfWeapon == 2)) {
                    $this->globalSelected ('Assault weapon ?', 'assault',$this->yes, $dataWeapon['assault']);
                    $this->globalSelected ('Saturation weapon ?', 'saturation',$this->yes, $dataWeapon['saturation']);
                    echo '<label for="rateOfFire">Rate of fire :</label>';
                    echo '<input type="number" id="rateOfFire" name="rateOfFire" value="'.$dataWeapon['rateOfFire'].'" min="1" max="12"/>';
                    echo '<label for="rangeWeapon'.$typeOfWeapon.'">Weapon range :</label>';
                    echo '<input type="range" id="rangeWeapon'.$typeOfWeapon.'" value="'.$dataWeapon['rangeWeapon'].'" name="rangeWeapon" min="0" max="120" step="2" oninput="updateRangeValue'.$typeOfWeapon.'()"/>';
                    echo '<div>Range max size : <span id="rangeValue'.$typeOfWeapon.'">'.$dataWeapon['rangeWeapon'].'</span> "</div>';
                    echo '<script>
                        const updateRangeValue'.$typeOfWeapon.' = () => {
                            let rangeValue'.$typeOfWeapon.' = document.getElementById("rangeWeapon'.$typeOfWeapon.'").value;
                            document.getElementById("rangeValue'.$typeOfWeapon.'").textContent = rangeValue'.$typeOfWeapon.';
                        }
                    </script>';
                }
                if($typeOfWeapon == 2) {
                    $this->globalSelected ('Blast Gabarit ?', 'templateType',$this->gabaritType, $dataWeapon['templateType']);
                    $this->globalSelected ('Blast dice ?', 'blastDice',$this->blastDice, $dataWeapon['blastDice']);
                }
            echo '<input type="hidden" name="idWeapon" value="'.$idWeapon.'"/>';
            echo ' <button class="buttonForm green" type="submit" name="idNav" value="'.$idNav.'">Update weapon</button>';
            echo '</form>';
        echo '</article>';
    }
    private function printNameFaction  ($idFaction) {
        $FactionsUser = new SQLFactions ();
        $datasFaction  = $FactionsUser->getNameFaction ($idFaction);
        echo '<h3>'.$datasFaction[0]['nameUnivers'].' - Faction : '.$datasFaction[0]['nomFaction'].'</h3>';
     }
    public function printListWeapon ($idFaction, $idNav) {
        function fixingWeapon ($idWeapon, $fix, $idNav) {
            if($fix) {
                return '<form action="'.encodeRoutage(88).'" method="post">
                <input type="hidden" name="idWeapon" value="'.$idWeapon.'"/>
                <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Unfix weapon</button>
            </form>';
            } else {
                return '<form action="'.encodeRoutage(88).'" method="post">
                <input type="hidden" name="idWeapon" value="'.$idWeapon.'"/>
                <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Fix weapon</button>
            </form>';
            }
        }
        $this->printNameFaction  ($idFaction);
        $dataListWeapons = $this->getAllWeaponOfFaction ($idFaction);
        if(empty($dataListWeapons)) {
            echo '<a href="'.findTargetRoute(179).'">Creat a new weapon ?</a>';
        } else {
            //`idWeapon`, `nameWeapon`, `power`, `overPower`, `typeWeapon`, `fixe`, `price`, `heavy`, `assault`, `saturation`, `rateOfFire`, `templateType`, `rangeWeapon`, `blastDice`, `spell`
            echo '<article class="flex-center">';
            echo '<table class="tableWebSite">';
                echo '<tr>';
                    echo '<th>Name</th>';
                    echo '<th class="green">range</th>';
                    echo '<th class="red">Power</th>';
                    echo '<th>Type</th>';
                    echo '<th>Assault</th>';
                    echo '<th>Saturation</th>';
                    echo '<th>Rate of fire</th>';
                    echo '<th>Price</th>';
                    echo '<th>Admin</th>';
                    echo '<th>Fix</th>';
                    echo '<th>Delete</th>';
                echo '</tr>';
                foreach ($dataListWeapons as $value) {
         
                    $overPower = null;
                    if($value['overPower'] == 1) {
                        $overPower = '+';
                    }
                    if($value['rangeWeapon'] == 0) {
                    $range = "Contact";
                    } else {
                        $range = $value['rangeWeapon'].'"';
                    }
                    echo '<tr>';
                        echo '<td>'.$value['nameWeapon'].'</td>';
                        echo '<td class="green">'.$range.'</td>';
                        echo '<td class="red">'.$this->powerType[$value['power']].$overPower.'</td>';
                        echo '<td>'.$this->weaponTypes[$value['typeWeapon']].'</td>';
                        echo '<td>'.$this->yes[$value['assault']].'</td>';
                        echo '<td>'.$this->yes[$value['saturation']].'</td>';
                        echo '<td>'.$this->rateOfFire ($value['rateOfFire']).'</td>';
                        echo '<td>'.$value['price'].'</td>';
                        echo '<td><a href="'.findTargetRoute(182).'&idWeapon='.$value['idWeapon'].'">Go</a></td>';
                        echo '<td>'.fixingWeapon($value['idWeapon'], $value['fixe'], $idNav).'</td>';
                        echo '<td>
                        <form action="'.encodeRoutage(85).'" method="post">
                            <input type="hidden" name="idWeapon" value="'.$value['idWeapon'].'"/>
                            <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Delete</button>
                        </form>
                    </td>';
                echo '</tr>';
                }
                echo '</table>';
        }
    }
      public function displayOneWeapon ($idWeapon) {
        $dataWeapon = $this->getOneWeaponAdmin ($idWeapon);
        $overPower = null;
        if($dataWeapon['overPower'] == 1) {
            $overPower = "+";
        }
        echo '<table class="tableCodex codexGrey">';
            echo '<tr>';
                echo '<td>Owner : '.$dataWeapon['login'].'</td>';
                echo '<td>Fix weapon :  '. $this->yes[$dataWeapon['fixe']].'</td>';
                echo '<td>Valid weapon :  '. $this->yes[$dataWeapon['valid']].'</td>';
                echo '<td>Price :  '. round($dataWeapon['price'], 2).'</td>';
            echo'</tr>';
            echo'<tr>'; 
                echo '<td>'.$dataWeapon['nameWeapon'].'</td>';
                echo '<td>Type : '.$this->weaponTypes[ $dataWeapon['typeWeapon']].'</td>';
                echo '<td>Heavy : '. $this->yes[$dataWeapon['heavy']].'</td>';
                echo '<td class="red">Power : '.$this->powerType[$dataWeapon['power']].$overPower.'</td>';
                if($dataWeapon['typeWeapon'] > 0) {
                    $rangeSI = floor($dataWeapon['rangeWeapon'] * 2.54);
                    echo '<tr>';
                        echo '<td class="green">Range : '.$dataWeapon['rangeWeapon'].' " / '.$rangeSI.' cm</td>';
                        echo '<td>Assault : '. $this->yes[$dataWeapon['assault']].'</td>';
                        echo '<td>Saturation weapon : '. $this->yes[$dataWeapon['saturation']].'</td>';
                        echo '<td>Rate of fire : '. $this->rateOfFire ($dataWeapon['rateOfFire']).'</td>';
                    echo'</tr>';
                }
                if($dataWeapon['typeWeapon'] > 1) {
                    echo '<tr>';
                        echo '<td class="orange" colspan="2">Template type : '.$this->gabaritType[$dataWeapon['templateType']].'</td>';
                        echo '<td class="red" colspan="2">Blast dice : '.$this->PowerBlastDice[$dataWeapon['power']].$this->blastDice[$dataWeapon['blastDice']].'</td>';
                    echo'</tr>';
                }
            
            echo'</tr>';
     
            $this->displayResumeSR ($idWeapon);
            echo '</table>';
            return [$dataWeapon['fixe'], $dataWeapon['globalWeapon']];
    }
    public function printingOneWeapon ($idWeapon) {
        $dataWeapon = $this->getOneWeaponByOwner ($idWeapon);
        $dataWeapon = $this->getOneWeaponAdmin ($idWeapon);
        $overPower = null;
        if($dataWeapon['overPower'] == 1) {
            $overPower = "+";
        }
        $dammage = 1;
        if($dataWeapon['overPower']) {
            $dammage += $dammage;
        }
        if($dataWeapon['heavy']) {
            $dammage = $dammage * 2;
        }
        echo '<div class="tableWeaponCenter">';
            echo '<table class="tableCodex codexGrey">';
                switch ($dataWeapon['typeWeapon']) {
                    case 0:
                
                                echo'<tr>'; 
                                    echo '<td>'.$dataWeapon['nameWeapon'].'</td>';
                                    echo '<td>Type : '.$this->weaponTypes[ $dataWeapon['typeWeapon']].'</td>';
                                    echo '<td>Heavy : '. $this->yes[$dataWeapon['heavy']].'</td>';
                                    echo '<td class="red">Power : '.$this->powerType[$dataWeapon['power']].$overPower.' - Dammage/hit : '.$dammage.'</td>';
                                echo'</tr>';
                            echo '</table>';
                        break;
                    case 1:
                        $rangeSI = floor($dataWeapon['rangeWeapon'] * 2.54);
                 
                                echo'<tr>'; 
                                    echo '<td>'.$dataWeapon['nameWeapon'].'</td>';
                                    echo '<td>Type : '.$this->weaponTypes[ $dataWeapon['typeWeapon']].'</td>';
                                    echo '<td>Heavy : '. $this->yes[$dataWeapon['heavy']].'</td>';
                                    echo '<td class="green">Range : '.$dataWeapon['rangeWeapon'].' " / '.$rangeSI.' cm</td>';
                                    echo '<td class="red">Power : '.$this->powerType[$dataWeapon['power']].$overPower.' - Dammage/hit : '.$dammage.'</td>';
                                echo '</tr>';
                                echo '<tr>';
                                    echo '<td colspan="2">Assault : '. $this->yes[$dataWeapon['assault']].'</td>';
                                    echo '<td>Saturation weapon : '. $this->yes[$dataWeapon['saturation']].'</td>';
                                    echo '<td colspan="2">Rate of fire : '. $this->rateOfFire ($dataWeapon['rateOfFire']).'</td>';
                                echo'</tr>';
                           
                        break;
                    case 2:
                        $rangeSI = floor($dataWeapon['rangeWeapon'] * 2.54);
                 
                                echo'<tr>'; 
                                    echo '<td>'.$dataWeapon['nameWeapon'].'</td>';
                                    echo '<td>Type : '.$this->weaponTypes[ $dataWeapon['typeWeapon']].'</td>';
                                    echo '<td>Heavy : '. $this->yes[$dataWeapon['heavy']].'</td>';
                                    echo '<td class="green">Range : '.$dataWeapon['rangeWeapon'].' " / '.$rangeSI.' cm</td>';
                                    echo '<td class="red">Power : '.$this->powerType[$dataWeapon['power']].$overPower.' - Dammage/hit : '.$dammage.'</td>';
                                echo '</tr>';
                                echo '<tr>';
                                    echo '<td class="orange" colspan="4">Template type : '.$this->gabaritType[$dataWeapon['templateType']].'</td>';
                                    echo '<td class="red" colspan="1">Blast dice : '.$this->PowerBlastDice[$dataWeapon['power']].$this->blastDice[$dataWeapon['blastDice']].'</td>';
                                echo'</tr>';
                                echo '<tr>';
                                    echo '<td colspan="2">Assault : '. $this->yes[$dataWeapon['assault']].'</td>';
                                    echo '<td>Saturation weapon : '. $this->yes[$dataWeapon['saturation']].'</td>';
                                    echo '<td colspan="2">Rate of fire : '. $this->rateOfFire ($dataWeapon['rateOfFire']).'</td>';
                                echo'</tr>';
                          
                        break;
                    default:
                        echo 'No data avaiblaible';
                        break;
                }
               
        $this->displayResumeSR ($idWeapon);
        echo '</table>';
    echo '</div>';
    }
    public function addFormWeapon ($idWeapon, $idMiniature, $idNav) {
    echo '<form action="'.encodeRoutage(104).'" method="post">
        <input type="hidden" name="idWeapon" value="'.$idWeapon.'"/>
        <input type="hidden" name="idMiniature" value="'.$idMiniature.'"/>
        <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Add weapon</button>
    </form>';
    }
    public function displayWeaponNoFix ($firstPage, $WeaponByPage, $idNav, $fixe)  {
        $dataWeapon = $this->getWeapon ($firstPage, $WeaponByPage, $fixe);
            echo '<article class="flex-center">';
            echo '<table class="tableWebSite">';
                echo '<tr>';
                    echo '<th>Name</th>';
                    echo '<th>Power</th>';
                    echo '<th>Type</th>';
                    echo '<th>Price</th>';
                echo '</tr>';
                foreach ($dataWeapon as $value) {
                    $overPower = null;
                    if($value['overPower'] == 1) {
                        $overPower = '+';
                    }
                    echo '<tr>';
                    echo '<td>'.$value['nameWeapon'].'</td>';
                    echo '<td>'.$this->powerType[$value['power']].$overPower.'</td>';
                    echo '<td>'.$this->weaponTypes[$value['typeWeapon']].'</td>';
                    echo '<td>'.$value['price'].'</td>';
                    echo '<td><a href="'.findTargetRoute(182).'&idWeapon='.$value['id'].'">Weapon sheet</a></td>';
                echo '</tr>';
                }
            echo '</table>';
            echo '</article>';
       
    }
    public function listWeaponForChoiceUserGlobal ($typeWeapon, $idMiniature, $idNav) {
        $dataWeapon = $this->getWeaponByType ($typeWeapon);
        foreach ($dataWeapon as $value) {
            $this-> printingOneWeapon ($value['id']);
            $this->addFormWeapon ($value['id'], $idMiniature, $idNav);
        }
    }
}
