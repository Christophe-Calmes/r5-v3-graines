<?php
require ('sources/weapons/objects/SQLWeapons.php');
require('sources/factions/objets/sqlFactions.php');
final class TemplateWeaponsPublic extends SQLWeapons

{
    private function factionSelect () {
        $FactionsUser = new SQLFactions ();
        $dataFactions = $FactionsUser->getUserFaction ();
        echo '<div class="flex-rows">';
            echo '<label class="labelFirstLetter" for="idFaction">Factions :</label>';
            echo '<select id="idFaction"name="idFaction">';
                foreach ($dataFactions as  $value) {
                    echo '<option value="'.$value['idFaction'].'">'.$value['namenameUnivers'].' - '.$value['nomFaction'].' - LT'.$value['nt'].'</option>';
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
    private function printNameFaction  ($idFaction) {
        $FactionsUser = new SQLFactions ();
        $datasFaction  = $FactionsUser->getNameFaction ($idFaction);
        echo '<h3>'.$datasFaction[0]['nameUnivers'].' - Faction : '.$datasFaction[0]['nomFaction'].'</h3>';
     }
    public function printListWeapon ($idFaction, $idNav) {
        $this->printNameFaction  ($idFaction);
        $dataListWeapons = $this->getAllWeaponOfFaction ($idFaction);
        if(empty($dataListWeapons)) {
            echo '<a href="'.findTargetRoute(179).'">Creat a new weapon ?</a>';
        } else {
            echo '<article class="flex-center">';
            echo '<table class="tableWebSite">';
                echo '<tr>';
                    echo '<th>Name</th>';
                    echo '<th>Power</th>';
                    echo '<th>Type</th>';
                    echo '<th>Price</th>';
                    echo '<th>Fix</th>';
                    echo '<th>Admin</th>';
                    echo '<th>Delete</th>';
                echo '</tr>';
                foreach ($dataListWeapons as $value) {
                    $overPower = null;
                    if($value['overPower'] == 1) {
                        $overPower = '+';
                    }
                    echo '<tr>';
                        echo '<td>'.$value['nameWeapon'].'</td>';
                        echo '<td>'.$this->powerType[$value['power']].$overPower.'</td>';
                        echo '<td>'.$this->weaponTypes[$value['typeWeapon']].'</td>';
                        echo '<td>'.$value['price'].'</td>';
                        echo '<td>'.$this->yes[$value['fixe']].'</td>';
                        echo '<td><a href="'.findTargetRoute(182).'&idWeapon='.$value['idWeapon'].'">Go</a></td>';
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
    public function printingOneWeapon ($idWeapon) {
        $dataWeapon = $this->getOneWeaponByOwner ($idWeapon);
        print_r($dataWeapon);
    }
}
