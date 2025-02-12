<?php
require ('sources/weapons/objects/SQLWeapons.php');
require('sources/factions/objets/sqlFactions.php');
final class TemplateWeaponsPublic extends SQLWeapons

{
    public function factionSelect () {
        $FactionsUser = new SQLFactions ();
        $dataFactions = $FactionsUser->getUserFaction ();
        echo '<div class="flex-rows">';
            echo '<label class="labelFirstLetter" for="idFaction">Factions</label>';
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
            echo '<label class="labelFirstLetter" for="idFaction">Factions</label>';
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
            $this->textSR($dataSR);
        }
     
    }
    private function displayResumeSRDataSheet ($idWeapon) {
        $dataSR = $this->getSpecialRuleOfOneWeapon ($idWeapon);
        $specialRules = null;
            foreach ($dataSR as $value) {
                $specialRules = $specialRules.$value['nameSpecialRules'].'.';
            }
        if(!empty($specialRules) ) {
            if(!empty($dataSR)) {
            foreach ($dataSR as $value) {
            echo'<ul class="SpecialRules">
                    <li class="NameRS fontWeigth dataSheetInfoPrint">'.$value['nameSpecialRules'].'</li>
                    <li class="TextRS fontSize">'.$value['descriptionSpecialRules'].'</li>
                 </ul>';
                }
            } else {
                echo '<h4>Pas de données</h4>';
            }
        }
     
    }

    public function formCreatWeapon ($typeOfWeapon, $idNav) {
        
        $adressCreat = [82, 83, 84];
        echo '<article>';
        echo '<h4>'.$this->weaponTypes[$typeOfWeapon].' weapon</h4>';
            echo '<form class="customerForm" action="'.encodeRoutage($adressCreat[$typeOfWeapon]).'" method="post">';
                echo '<label class="labelFirstLetter" for="nameWeapon">Nom</label>';
                echo '<input id="nameWeapon" name="nameWeapon" placeholder="Name of weapon"/>';
                $this->factionSelect ();
                $this->globalSelect ('Puissance','power', $this->powerType);
                $this->globalSelect('Surpuissance ?', 'overPower',$this->yes);
                $this->globalSelect('Lourde ?', 'heavy', $this->yes);
                $this->globalSelect('Sort ?', 'spell',$this->yes);
                if(($typeOfWeapon == 1)||($typeOfWeapon == 2)) {
                    $this->globalSelect('Assaut ?', 'assault',$this->yes);
                    $this->globalSelect('Saturation ?', 'saturation',$this->yes);
                    echo '<label for="rateOfFire">Cadence de tir</label>';
                    echo '<input type="number" id="rateOfFire" name="rateOfFire" value="1" min="1" max="12"/>';
                    echo '<label for="rangeWeapon'.$typeOfWeapon.'">Portée</label>';
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
                    $this->globalSelect('Gabarit ?', 'templateType',$this->gabaritType);
                    $this->globalSelect('dé de souffle ?', 'blastDice',$this->blastDice);
                }
            echo ' <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Créer</button>';
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
         echo '<h4>Mettre à jour : arme de '.$this->weaponTypes[$dataWeapon['typeWeapon']].' - '.$dataWeapon['nameWeapon'].'</h4>';
           echo '<form class="customerForm" action="'.encodeRoutage($adressCreat[$dataWeapon['typeWeapon']]).'" method="post">';
                 echo '<label class="labelFirstLetter" for="nameWeapon">Nom</label>';
                echo '<input id="nameWeapon" name="nameWeapon" value="'.$dataWeapon['nameWeapon'].'"/>';
               
                $this->globalSelected ('Puissance','power', $this->powerType, $dataWeapon['power']);
                $this->globalSelected ('SurPuissance ?', 'overPower',$this->yes, $dataWeapon['overPower']);
                $this->globalSelected ('Lourde ?', 'heavy', $this->yes, $dataWeapon['heavy']);
                $this->globalSelected ('Sort ?', 'spell',$this->yes, $dataWeapon['spell']);
        
                if(($typeOfWeapon == 1)||($typeOfWeapon == 2)) {
                    $this->globalSelected ('Assaut ?', 'assault',$this->yes, $dataWeapon['assault']);
                    $this->globalSelected ('Saturation ?', 'saturation',$this->yes, $dataWeapon['saturation']);
                    echo '<label for="rateOfFire">Cadence de tir</label>';
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
                    $this->globalSelected ('Gabarit ?', 'templateType',$this->gabaritType, $dataWeapon['templateType']);
                    $this->globalSelected ('Dé de souffle ?', 'blastDice',$this->blastDice, $dataWeapon['blastDice']);
                }
            echo '<input type="hidden" name="idWeapon" value="'.$idWeapon.'"/>';
            echo ' <button class="buttonForm green" type="submit" name="idNav" value="'.$idNav.'">Mettre à jour</button>';
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
                <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Unfix</button>
            </form>';
            } else {
                return '<form action="'.encodeRoutage(88).'" method="post">
                <input type="hidden" name="idWeapon" value="'.$idWeapon.'"/>
                <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Fix</button>
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
                    echo '<th>Nom</th>';
                    echo '<th class="green">Portée</th>';
                    echo '<th class="red">Puissance</th>';
                    echo '<th>Type</th>';
                    echo '<th>Assaut</th>';
                    echo '<th>Saturation</th>';
                    echo '<th>Cadence de tir</th>';
                    echo '<th>Prix</th>';
                    echo '<th>Admin</th>';
                    echo '<th>Fix</th>';
                    echo '<th>Effacer</th>';
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
                        echo '<td><a href="'.findTargetRoute(182).'&idWeapon='.$value['idWeapon'].'">Voir</a></td>';
                        echo '<td>'.fixingWeapon($value['idWeapon'], $value['fixe'], $idNav).'</td>';
                        echo '<td>
                        <form action="'.encodeRoutage(85).'" method="post">
                            <input type="hidden" name="idWeapon" value="'.$value['idWeapon'].'"/>
                            <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Effacer</button>
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
                echo '<td>Propriétaire : '.$dataWeapon['login'].'</td>';
                echo '<td>Fix :  '. $this->yes[$dataWeapon['fixe']].'</td>';
                echo '<td>Valid :  '. $this->yes[$dataWeapon['valid']].'</td>';
                echo '<td>Prix :  '. round($dataWeapon['price'], 2).'</td>';
            echo'</tr>';
            echo'<tr>'; 
                echo '<td>'.$dataWeapon['nameWeapon'].'</td>';
                echo '<td>Type : '.$this->weaponTypes[ $dataWeapon['typeWeapon']].'</td>';
                echo '<td>Lourde : '. $this->yes[$dataWeapon['heavy']].'</td>';
                echo '<td class="red">Puissance : '.$this->powerType[$dataWeapon['power']].$overPower.'</td>';
                if($dataWeapon['typeWeapon'] > 0) {
                    $rangeSI = floor($dataWeapon['rangeWeapon'] * 2.54);
                    echo '<tr>';
                        echo '<td class="green">Portée : '.$dataWeapon['rangeWeapon'].' " / '.$rangeSI.' cm</td>';
                        echo '<td>Assaut : '. $this->yes[$dataWeapon['assault']].'</td>';
                        echo '<td>Saturation : '. $this->yes[$dataWeapon['saturation']].'</td>';
                        echo '<td>Cadence de tir : '. $this->rateOfFire ($dataWeapon['rateOfFire']).'</td>';
                    echo'</tr>';
                }
                if($dataWeapon['typeWeapon'] > 1) {
                    echo '<tr>';
                        echo '<td class="orange" colspan="2">Gabarit : '.$this->gabaritType[$dataWeapon['templateType']].'</td>';
                        echo '<td class="red" colspan="2">Dé de souffle : '.$this->PowerBlastDice[$dataWeapon['power']].$this->blastDice[$dataWeapon['blastDice']].'</td>';
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
                                    echo '<td>Lourde : '. $this->yes[$dataWeapon['heavy']].'</td>';
                                    echo '<td class="red">Puissance : '.$this->powerType[$dataWeapon['power']].$overPower.' - Dammage/hit : '.$dammage.'</td>';
                                echo'</tr>';
                            echo '</table>';
                        break;
                    case 1:
                        $rangeSI = floor($dataWeapon['rangeWeapon'] * 2.54);
                 
                                echo'<tr>'; 
                                    echo '<td>'.$dataWeapon['nameWeapon'].'</td>';
                                    echo '<td>Type : '.$this->weaponTypes[ $dataWeapon['typeWeapon']].'</td>';
                                    echo '<td>Lourde : '. $this->yes[$dataWeapon['heavy']].'</td>';
                                    echo '<td class="red">Puissance : '.$this->powerType[$dataWeapon['power']].$overPower.' - Dammage/hit : '.$dammage.'</td>';
                                    echo '<td class="green">Portée : '.$dataWeapon['rangeWeapon'].' " / '.$rangeSI.' cm</td>';
                                echo '</tr>';
                                echo '<tr>';
                                    echo '<td colspan="2">Assaut : '. $this->yes[$dataWeapon['assault']].'</td>';
                                    echo '<td>Saturation : '. $this->yes[$dataWeapon['saturation']].'</td>';
                                    echo '<td colspan="2">Cadence de tir : '. $this->rateOfFire ($dataWeapon['rateOfFire']).'</td>';
                                echo'</tr>';
                           
                        break;
                    case 2:
                        $rangeSI = floor($dataWeapon['rangeWeapon'] * 2.54);
                 
                                echo'<tr>'; 
                                    echo '<td>'.$dataWeapon['nameWeapon'].'</td>';
                                    echo '<td>Type : '.$this->weaponTypes[ $dataWeapon['typeWeapon']].'</td>';
                                    echo '<td>Lourde : '. $this->yes[$dataWeapon['heavy']].'</td>';
                                    echo '<td class="red">Puissance : '.$this->powerType[$dataWeapon['power']].$overPower.' - Dammage/hit : '.$dammage.'</td>';
                                    echo '<td class="green">Portée : '.$dataWeapon['rangeWeapon'].' " / '.$rangeSI.' cm</td>';
                                   
                                echo '</tr>';
                                echo '<tr>';
                                echo '<td colspan="2">Assaut : '. $this->yes[$dataWeapon['assault']].'</td>';
                                echo '<td>Saturation: '. $this->yes[$dataWeapon['saturation']].'</td>';
                                echo '<td colspan="2">Cadence de tir : '. $this->rateOfFire ($dataWeapon['rateOfFire']).'</td>';
                            echo'</tr>';
                                echo '<tr>';
                                    echo '<td class="orange" colspan="4">Gabarit : '.$this->gabaritType[$dataWeapon['templateType']].'</td>';
                                    echo '<td class="red" colspan="1">Dé de souffle : '.$this->PowerBlastDice[$dataWeapon['power']].$this->blastDice[$dataWeapon['blastDice']].'</td>';
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
    private function addFormWeapon ($idWeapon, $idMiniature, $idNav) {
    echo '<form action="'.encodeRoutage(104).'" method="post">
        <input type="hidden" name="idWeapon" value="'.$idWeapon.'"/>
        <input type="hidden" name="idMiniature" value="'.$idMiniature.'"/>
        <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Ajouter</button>
    </form>';
    }
    private function addFormWeaponVehicle ($idWeapon, $idVehicle, $idNav) {
        echo '<form action="'.encodeRoutage(116).'" method="post">
            <input type="hidden" name="idWeapon" value="'.$idWeapon.'"/>
            <input type="hidden" name="idVehicle" value="'.$idVehicle.'"/>
            <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Ajouter</button>
        </form>';
        }
    private function substractWeapon ($idWeapon, $idMiniature, $idNav) {
        echo '<form action="'.encodeRoutage(105).'" method="post">
        <input type="hidden" name="idWeapon" value="'.$idWeapon.'"/>
        <input type="hidden" name="idMiniature" value="'.$idMiniature.'"/>
        <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Retirer</button>
    </form>';
    }
    public function displayWeaponNoFix ($firstPage, $WeaponByPage, $idNav, $fixe)  {
        $dataWeapon = $this->getWeapon ($firstPage, $WeaponByPage, $fixe);
            echo '<article class="flex-center">';
            echo '<table class="tableWebSite">';
                echo '<tr>';
                    echo '<th>Nom</th>';
                    echo '<th>Puissance</th>';
                    echo '<th>Type</th>';
                    echo '<th>Prix</th>';
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
                    echo '<td><a href="'.findTargetRoute(182).'&idWeapon='.$value['id'].'">Fiche</a></td>';
                echo '</tr>';
                }
            echo '</table>';
            echo '</article>';
       
    }

    public function listWeaponForChoiceUserGlobal ($typeWeapon, $id, $idNav, $vehicle) {
        $dataWeapon = $this->getWeaponByType ($typeWeapon);
        foreach ($dataWeapon as $value) {
            $this-> printingOneWeapon ($value['id']);
            if(!$vehicle) {
                $this->addFormWeapon ($value['id'], $id, $idNav);
            } else {
                $this->addFormWeaponVehicle ($value['id'], $id, $idNav);
            }
            
        }
    }
    public function listWeaponFactionForChoiseUser($typeWeapon, $id, $idFaction, $idNav, $vehicle) {
        $dataWeapon = $this->getWeaponByTypeAndFaction ($typeWeapon, $idFaction);
        foreach ($dataWeapon as $value) {
            $this-> printingOneWeapon ($value['id']);
            if(!$vehicle) {
                $this->addFormWeapon ($value['id'], $id, $idNav);
            } else {
                $this->addFormWeaponVehicle ($value['id'], $id, $idNav);
            }
            
        }
    }
    public function displayWeaponOneMiniature ($idMiniature, $idNav, $fixMiniature) {
        $dataWeapon = $this->getWeaponOfOneMiniature ($idMiniature);
        echo '<ul class="inline">';
        foreach ($dataWeapon as $idWeapon) {
            echo '<li>';
            $this->printingOneWeapon ($idWeapon['id']);
            if($fixMiniature == 1) {
                $this->substractWeapon ($idWeapon['id'], $idMiniature, $idNav);
            }
            echo '</li>';
        }
        echo '</ul>';
    }
    private function deleteWeaponVehicle ($idVehicle, $idWeapon, $idNav) {
        echo '<form action="'.encodeRoutage(117).'" method="post">
        <input type="hidden" name="idWeapon" value="'.$idWeapon.'"/>
        <input type="hidden" name="idVehicle" value="'.$idVehicle.'"/>
        <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Retirer</button>
    </form>';
    }
    public function printVehicleWeaponUpdate ($idVehicle, $idNav) {
        $idsWeaponOfVehicle = $this->getWeaponOfOnVehicleUpdate ($idVehicle);
        foreach ($idsWeaponOfVehicle as $value) {
            echo '<div class="itemWeapon">';
            $this->printingOneWeapon ($value['idWeapon']);
            $this->deleteWeaponVehicle ($idVehicle, $value['idWeapon'], $idNav);
            echo '</div>';
        }
    }
    public function printVehicleWeaponDatasheet ($idVehicle, $face) {
        $dataListWeapons = $this->getWeaponOfOneVehicle($idVehicle);
        if($dataListWeapons) {
            echo '<article>';
                echo '<h3>Armes du véhicule</h3>';
                foreach ($dataListWeapons  as $dataWeapon) {
                    echo '<aside class="borderDataSheetWeapon">';
                    $overPower = null;
                    $damage = 1;
                    if($dataWeapon['overPower'] == 1) {
                        $overPower = "+";
                    }
                    if($dataWeapon['overPower']) {
                        $damage += $damage;
                    }
                    if($dataWeapon['heavy']) {
                        $damage = $damage * 2;
                    }
        
                    switch ($dataWeapon['typeWeapon']) {
                        case 0:
                            echo '<div class="dataSheetWeapon">
                            <div class="titlePrintDataSheet fontWeigth">'.$dataWeapon['nameWeapon'].'</div>
                            <div>Lourde : '. $this->yes[$dataWeapon['heavy']].'</div>
                            <div>Puissance : '.$this->powerType[$dataWeapon['power']].$face.$overPower.'</div>
                            <div>Dommage '.$damage.'</div>
                        </div>';
                            break;
                        case 1:
                            echo '<div class="dataSheetWeapon">
                            <div class="titlePrintDataSheet fontWeigth">'.$dataWeapon['nameWeapon'].'</div>
                            <div>Lourde : '. $this->yes[$dataWeapon['heavy']].'</div>
                            <div>Puissance : '.$this->powerType[$dataWeapon['power']].$face.$overPower.'</div>
                            <div>Dommage '.$damage.'</div>
                            <div>Portée : '.$dataWeapon['rangeWeapon'].' "</div>
                        </div>';
                            break;
                        case 2:
                            echo '<div class="dataSheetWeapon">
                                <div class="titlePrintDataSheet fontWeigth">'.$dataWeapon['nameWeapon'].'</div>
                                <div>Lourde : '. $this->yes[$dataWeapon['heavy']].'</div>
                                <div>Puissance : '.$this->powerType[$dataWeapon['power']].$face.$overPower.'</div>
                                <div>Dommage '.$damage.'</div>
                                <div>Portée: '.$dataWeapon['rangeWeapon'].' "</div>
                                <div>Gabarit: '.$this->gabaritType[$dataWeapon['templateType']].'</div>
                                <div>Dé de souffle: '.$this->PowerBlastDice[$dataWeapon['power']].$this->blastDice[$dataWeapon['blastDice']].'</div>
                            </div>';
                            break;
        
                    }
                    $this->displayResumeSRDataSheet ($dataWeapon['idWeapon']);
            echo '</aside>';
        }
        echo '</article>';
        }
       
    }
}
