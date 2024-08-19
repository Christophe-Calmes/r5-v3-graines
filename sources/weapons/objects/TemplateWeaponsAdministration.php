<?php
require ('sources/weapons/objects/SQLWeapons.php');
class TemplateWeaponsAdministration extends SQLWeapons
{
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
    private function displayResumeSR ($idWeapon) {
        $dataSR = $this->getSpecialRuleOfOneWeapon ($idWeapon);
        $specialRules = null;
      
            foreach ($dataSR as $value) {
                $specialRules = $specialRules.$value['nameSpecialRules'].'.';
            }
        if(!empty($specialRules) ) {
            echo '<strong>Special rules : '.substr($specialRules,0,-1).'</strong>';
        }
       
    }
    public function formCreatWeaponByAdmin ($typeOfWeapon, $idNav) {
        // A travailler
        $adressCreat = [75, 76, 77];
        echo '<article>';
        echo '<h4>'.$this->weaponTypes[$typeOfWeapon].' weapon</h4>';
            echo '<form class="customerForm" action="'.encodeRoutage($adressCreat[$typeOfWeapon]).'" method="post">';
                echo '<label class="labelFirstLetter" for="nameWeapon">Name of weapons</label>';
                echo '<input id="nameWeapon" name="nameWeapon" placeholder="Name of weapon"/>';
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
    public function formUpdateWeaponByAdmin ($idWeapon, $idNav) {
        $dataWeapon = $this->getOneWeaponAdmin ($idWeapon);
        $adressCreat = [89, 90, 91];
        $typeOfWeapon = $dataWeapon['typeWeapon'];
        echo '<article>';
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


    public function displayWeaponNoFix ($firstPage, $WeaponByPage, $idNav, $fixe)  {
        $dataWeapon = $this->getWeapon ($firstPage, $WeaponByPage, $fixe);
        if(!empty( $dataWeapon)) {
            $messageFix = ['Unfix', 'Details', 'View'];
            if($fixe == 0) {
                $messageFix = ['fix', 'Add special rules', 'Admin'];
            }
            echo '<article class="flex-center">';
            echo '<table class="tableWebSite">';
                echo '<tr>';
                    echo '<th>Name</th>';
                    echo '<th>Power</th>';
                    echo '<th>Type</th>';
                    echo '<th>Price</th>';
                    echo '<th>Fix</th>';
                    echo '<th>'.$messageFix[1].'</th>';
                    echo '<th>Delete</th>';
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
                    echo '<td><form action="'.encodeRoutage(81).'" method="post">
                            <input type="hidden" name="idWeapon" value="'.$value['id'].'"/>
                            <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">'.$messageFix[0].'</button>
                        </form></td>';
                    echo '<td><a href="'.findTargetRoute(177).'&idWeapon='.$value['id'].'">'.$messageFix[2].'</a></td>';
                    echo '<td>
                        <form action="'.encodeRoutage(80).'" method="post">
                            <input type="hidden" name="idWeapon" value="'.$value['id'].'"/>
                            <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Delete</button>
                        </form>
                    </td>';
                echo '</tr>';
                }
            echo '</table>';
            echo '</article>';
        } else {
            echo '<p>No weapon find.</p>';
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
                        echo '<td>Rate of fire : '. $dataWeapon['rateOfFire'].'/ round</td>';
                    echo'</tr>';
                }
                if($dataWeapon['typeWeapon'] > 1) {
                    echo '<tr>';
                        echo '<td class="orange" colspan="2">Template type : '.$this->gabaritType[$dataWeapon['templateType']].'</td>';
                        echo '<td class="red" colspan="2">Blast dice : '.$this->PowerBlastDice[$dataWeapon['power']].$this->blastDice[$dataWeapon['blastDice']].'</td>';
                    echo'</tr>';
                }
            
            echo'</tr>';
        echo '</table>';
            $this->displayResumeSR ($idWeapon);
            return $dataWeapon['fixe'];
    }
    public function displayOneWeaponPrinting ($idWeapon) {
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
        echo '<table class="tableCodex codexGrey">';
            echo'<tr>'; 
                echo '<td>'.$dataWeapon['nameWeapon'].'</td>';
                echo '<td>Type : '.$this->weaponTypes[ $dataWeapon['typeWeapon']].'</td>';
                echo '<td>Heavy : '. $this->yes[$dataWeapon['heavy']].'</td>';
                echo '<td class="red">Power : '.$this->powerType[$dataWeapon['power']].$overPower.'  - Dammage/hit : '.$dammage.'</td>';
                if($dataWeapon['typeWeapon'] > 0) {
                    $rangeSI = floor($dataWeapon['rangeWeapon'] * 2.54);
                    echo '<tr>';
                        echo '<td class="green">Range : '.$dataWeapon['rangeWeapon'].' " / '.$rangeSI.' cm</td>';
                        echo '<td>Assault : '. $this->yes[$dataWeapon['assault']].'</td>';
                        echo '<td>Saturation weapon : '. $this->yes[$dataWeapon['saturation']].'</td>';
                        echo '<td>Rate of fire : '. $dataWeapon['rateOfFire'].'/ round</td>';
                    echo'</tr>';
                }
                if($dataWeapon['typeWeapon'] > 1) {
                    echo '<tr>';
                        echo '<td class="orange" colspan="2">Template type : '.$this->gabaritType[$dataWeapon['templateType']].'</td>';
                        echo '<td class="red" colspan="2">Blast dice : '.$this->PowerBlastDice[$dataWeapon['power']].$this->blastDice[$dataWeapon['blastDice']].'</td>';
                    echo'</tr>';
                }
            
            echo'</tr>';
        echo '</table>';
        $this->displayResumeSR ($idWeapon);
    }
}
