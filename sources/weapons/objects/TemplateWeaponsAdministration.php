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
    public function formCreatWeaponByAdmin ($typeOfWeapon, $idNav) {
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
    public function displayWeaponNoFix ($firstPage, $WeaponByPage, $idNav)  {
        $dataWeapon = $this->getWeaponNoFix ($firstPage, $WeaponByPage);
        print_r($dataWeapon);
    }
}
