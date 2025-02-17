<?php
require ('sources/vehicles/objets/SQLvehicles.php');
require_once ('sources/weapons/objects/TemplateWeaponsPublic.php');
require_once ('sources/specialRules/objects/TemplatesSpecialRules.php');
class TemplatesVehicles extends SQLvehicles 
{
    private function movingSolveVehicle ($move) {
        return [$move, round($move * 2)];
    }
    private function globalSelect ($label, $fields, $array, $nameFields) {
        echo '<div class="flex-rows">';
            echo '<label class="labelFirstLetter" for="'.$fields.'">'.$label.'</label>';
            echo '<select id="'.$fields.'"name="'.$fields.'">';
                foreach ($array as $value) {
                    echo '<option value="'.$value['id'].'">'.$value[$nameFields].'</option>';
                }
            echo '</select>';
        echo '</div>';
    }
    private function globalSelected ($label, $fields, $array, $nameFields, $selected) {
    
        echo '<div class="flex-rows">';
            echo '<label class="labelFirstLetter" for="'.$fields.'">'.$label.'</label>';
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
        echo '<h3>Nouveau véhicule</h3>';
        $factionMiniature->factionSelect ();
        echo '<label for="nameVehicle">Nom</label>';
        echo '<input id="nameVehicle" name="nameVehicle" placeholder="Nom du véhicule"/>';
        $this->globalSelect ('DQM', 'dqm', $this->dice, 'nameDice');
        $this->globalSelect ('DC', 'dc', $this->dice, 'nameDice');
        $this->globalSelect ('Sauvegarde / D6', 'armor',    $this->armour, 'nameArmour');
        $this->globalSelect('PdS', 'structurePoint', $this->structurePoint, 'Structure');
        $this->globalSelect('Taille du véhicule', 'sizeVehicle', $this->sizeVehicle, 'NameSize');
        $this->globalSelect('Type du véhicule', 'typeVehicle', $this->typeVehicle, 'NameType');
        echo '<label for="move">Mouvement tactique</label>';
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
        $this->globalSelect ('Vol', 'fligt', $this->yes, 'name');
        $this->globalSelect ('Vol stationnaire', 'stationnaryFligt', $this->yes, 'name');
  
   
        echo '<label for="picture">Image du véhicule</label>';
        echo '<input id="picture" type="file" name="namePicture" accept="image/png, image/jpeg, image/webp"/>';
        echo ' <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Créer</button>';
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
        <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Equiper en arme</button>
        </form>';
    }
    protected function formUpdateOneVehicle ($data, $idNav) {
        $factionMiniature = new TemplateWeaponsPublic ();
        //$this->fixVehicleDataSheet ($data['id'], $idNav);
        echo '<form class="customerForm"  action="'.encodeRoutage(110).'" method="post" enctype="multipart/form-data">';
        echo '<h3>Mettre à jour '.$data['nameVehicle'].' véhicule</h3>';
        $factionMiniature->factionSelected ($data['idFaction']); 
        echo '<label for="nameVehicle">Nom</label>';
        echo '<input id="nameVehicle" name="nameVehicle" value="'.$data['nameVehicle'].'"/>';
        $this->globalSelected ('DQM', 'dqm', $this->dice, 'nameDice', $data['dqm']);
        $this->globalSelected ('DC', 'dc', $this->dice, 'nameDice', $data['dc']);
        $this->globalSelected ('Sauvegarde / D6', 'armor',    $this->armour, 'nameArmour', $data['armor']);
        $this->globalSelected ('PdS', 'structurePoint', $this->structurePoint, 'Structure', $data['structurePoint']);
        $this->globalSelected ('Taille du véhicule', 'sizeVehicle', $this->sizeVehicle, 'NameSize', $data['sizeVehicle']);
        $this->globalSelected ('Type du véhicule', 'typeVehicle', $this->typeVehicle, 'NameType', $data['typeVehicle']);
        echo '<label for="move">Mouvement tactique</label>';
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
        $this->globalSelected ('Vol', 'fligt', $this->yes, 'name', $data['fligt']);
        $this->globalSelected ('Vol stationnaire', 'stationnaryFligt', $this->yes, 'name', $data['stationnaryFligt']);
        echo '<label for="picture">Image du véhicule</label>';
        echo '<input id="picture" type="file" name="namePicture" accept="image/png, image/jpeg, image/webp"/>';
        echo '<input type="hidden" name="idVehicle" value="'.$data['id'].'"/>';
        echo ' <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Mettre à jour</button>';
        echo '</form>';
    }
    private function getArray ($array, $index, $exitValue) {
        $index = $index - 1;
        return $array[$index][$exitValue];
    }
    private function formDeleteVehicleByOwner ($idVehicle, $idNav) {
       echo '<td><form action="'.encodeRoutage(114).'" method="post">
                        <input type="hidden" name="idVehicle"  value="'.$idVehicle.'"/>
                        <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Effacer</button>
                        </form></td>';
    }
    public function printListVehicle ($data, $idNav) {
        $dataVehicle = $this->getVehicle ($data);
        
        if(empty($dataVehicle)) {
            echo '<h4>Pas de données</h4>';
            echo '<a href="'.findTargetRoute(193).'">AddVehicle</a>';
        } else {
            echo '<article class="flex-center">';
            echo '<table  class="tableWebSite">';
             echo '<tr>';
                echo '<th>Etape</th>';
                echo '<th>Nom</th>';
                echo '<th>Type</th>';
                echo '<th>Taille</th>';
                echo '<th>DQM</th>';
                echo '<th>DC</th>';
                echo '<th>Mouvement</th>';
                echo '<th>Vol</th>';
                echo '<th>Vol stationnaire</th>';
                echo '<th>Blindage</th>';
                echo '<th>PdS</th>';
                echo '<th>Prix</th>';
                echo '<th>Administration</th>';
                echo '<th>Effacer</th>';
             echo '</tr>';
            foreach($dataVehicle as $value) {
                $moving = $this->movingSolveVehicle($value['moving']);
                $message = 'Update vehicle';
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
                        <form action="'.encodeRoutage(118).'" method="post">
                        <input type="hidden" name="idVehicle"  value="'.$value['id'].'"/>
                        <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Mettre en service actif</button>
                        </form>
                    </td>';
                    break;
                    case 3:
                    echo '<td>
                    <form action="'.encodeRoutage(119).'" method="post">
                        <input type="hidden" name="idVehicle"  value="'.$value['id'].'"/>
                        <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Retirer du service actif</button>
                        </form>

                    </td>';
                    $message = 'Fiche du véhicule';
                    break;
             
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
                echo '<td><a href="'.findTargetRoute(196).'&idVehicle='.$value['id'].'">'.$message.'</a></td>';
                $this->formDeleteVehicleByOwner ($value['id'], $idNav);
                echo '</tr>';
            }
             echo '</table>';
             echo '</article>';
        }
    }
    private function listVehicleChoiceGlobalWeapon ($idVehicle, $idNav) {
        $listWeapon = new TemplateWeaponsPublic ();
        echo '<h2>Armes de faction</h2>';
        $weaponName = [' contact', 'tir',  'souffle'];
        for ($i=0; $i <=2 ; $i++) { 
            echo ' <article class="flex-colonne-form">';
            echo '<details>';
            echo '<summary class="titleSite">
            Armes de '.$weaponName[$i].'
            </summary>
                    <h4>Liste armes de'.$weaponName[$i].' </h4>';
                    $listWeapon->listWeaponForChoiceUserGlobal ($i, $idVehicle, $idNav, true);
                echo '</details>';
            echo '</article>';
        }
    }
    private function listVehicleChoiceFactionWeapon ($idVehicle, $idNav, $idFaction)  {
        $listWeapon = new TemplateWeaponsPublic ();
        echo '<h2>Armes de faction</h2>';
        $weaponName = [' contact', 'tir',  'souffle'];
        for ($i=0; $i <=2 ; $i++) { 
            echo ' <article class="flex-colonne-form">';
            echo '<details>';
            echo '<summary class="titleSite">
            Armes de '.$weaponName[$i].'
            </summary>
                    <h4>Liste armes de'.$weaponName[$i].' </h4>';
                    $listWeapon->listWeaponFactionForChoiseUser ($i, $idVehicle, $idFaction, $idNav, true);
                echo '</details>';
            echo '</article>';
        }
      
     
    }
    private function listOfVehicleWeapon ($idVehicle, $idNav) {
        $dataWeaponVehicle = new TemplateWeaponsPublic ();
        echo '<h3>Liste des armes affectés</h3>';
        echo '<article class="gallery">';
            $dataWeaponVehicle->printVehicleWeaponUpdate ($idVehicle, $idNav);
        echo '</article>';

    }

    private function StructurePoint ($structure) {
        echo '<article class="flex-StructurePoints"><h4>Point de structure</h4>';
            for ($i=0; $i < $structure ; $i++) { 
                echo '<div class="checkbox-no-Reactive">'.($i+1).'</div>';
            }
        echo '</article>';
    }
    public function printingOnServiceOneVehicle ($dataVehicle) {
        $moving = $this->movingSolveVehicle($dataVehicle['moving']);
        $structurePoint = $this->getArray($this->structurePoint, $dataVehicle['structurePoint'], 'Structure');
        echo '<section class="centerDatasheet">';
        echo '<article class="dataSheetBox">';
        echo '<div class="printVehicle">
                <div class="Picture"><img class="imgCarouselAuto" src="sources/pictures/miniaturesPictures/'.$dataVehicle['namePicture'].'" alt="'.$dataVehicle['nameVehicle'].'"/></div>
                <div class="Name"><div class="titlePrintDataSheet">Nom</div>
                <div class="dataSheetInfoPrint">'.$dataVehicle['nameVehicle'].'</div>
                <div class="titlePrintDataSheet">Prix</div><div class="dataSheetInfoPrint">'.$dataVehicle['price'].' $</div>    
                </div>
                <div class="Type"><div class="titlePrintDataSheet">Type</div>
                <div class="dataSheetInfoPrint"> '.$this->getArray($this->typeVehicle, $dataVehicle['typeVehicle'], 'NameType').'</div>
                <div class="titlePrintDataSheet">Type</div>
                <div class="dataSheetInfoPrint"> '.$this->getArray($this->sizeVehicle, $dataVehicle['sizeVehicle'], 'NameSize').'</div>
                </div>
                <div class="DQM"><div class="titlePrintDataSheet">DQM</div><div class="dataSheetInfoPrint"> '.$this->getArray($this->dice, $dataVehicle['dqm'], 'nameDice').'</div></div>
                <div class="Structure"><div class="titlePrintDataSheet">Structure </div><div class="dataSheetInfoPrint">'.$structurePoint.'</div></div>
                <div class="Armor"><div class="titlePrintDataSheet">Sauvegarde</div><div class="dataSheetInfoPrint">'.$this->getArray($this->armour, $dataVehicle['armor'], 'nameArmour').'</div></div>
                <div class="Move">
                    <div class="titlePrintDataSheet">Mouvement</div>
                    <div class="dataSheetInfoPrint">
                    <ul class="listClass">
                        <li><strong>'.$moving[0].'" / '.$moving[1].' " + 1D4"</strong></li>
                        <li>Vol :  <strong>'.$this->getArray($this->yes, $dataVehicle['fligt'], 'name').'</strong></li>
                        <li>Vol stationnaire : <strong>'.$this->getArray($this->yes, $dataVehicle['stationnaryFligt'], 'name').'<strong></li>
                    </ul>
                    </div>
                </div>
                </div>
                </div>';
                // '.$this->getArray($this->sizeVehicle, $value['sizeVehicle'], 'NameSize').'
                $this->StructurePoint ($structurePoint);
                $specialRulesVehicle = new TemplatesSpecialRules ();
                $specialRulesVehicle->printSpecialRulesVehicle ($dataVehicle['id']);
                $listWeapon = new TemplateWeaponsPublic ();
                $face = $this->getArray($this->dice, $dataVehicle['dc'], 'faces');
                $listWeapon->printVehicleWeaponDatasheet ($dataVehicle['id'],  $face);
                
      echo '</article>';
     
      echo '</section>';      
    }


    public function printOneVehicle ($idVehicle, $idNav) {
        $dataVehicle = $this->getOneVehicle ($idVehicle);
        $dataVehicle = $dataVehicle[0];
        $moving = $this->movingSolveVehicle($dataVehicle['moving']);
        if($dataVehicle['fix']<3) {
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
                echo '<td colspan="2">Prix : '.$dataVehicle['price'].' $<br/>
                            Type : '.$this->getArray($this->typeVehicle, $dataVehicle['typeVehicle'], 'NameType').'</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td>
                        <ul>
                            <li>Mouvemement : '.$moving[0].'" / '.$moving[1].' " + 1D4"</li>
                            <li>Vol :  '.$this->getArray($this->yes, $dataVehicle['fligt'], 'name').'</li>
                            <li>Vol stationnaire: '.$this->getArray($this->yes, $dataVehicle['stationnaryFligt'], 'name').'</li>
                        </ul>
                    </td>';
                echo '<td>PdS : '.$this->getArray($this->structurePoint, $dataVehicle['structurePoint'], 'Structure').'</td>';
                echo '<td colspan="2">Sauvegarde : '.$this->getArray($this->armour, $dataVehicle['armor'], 'nameArmour').'</td>';
            
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
                echo ' <form action="'.encodeRoutage(120).'" method="post">
                        <input type="hidden" name="idVehicle"  value="'.$dataVehicle['id'].'"/>
                        <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Mettre en service actif</button>
                        </form>';
                $this->listOfVehicleWeapon ($dataVehicle['id'], $idNav);
                $this->listVehicleChoiceGlobalWeapon ($dataVehicle['id'], $idNav);
                $this->listVehicleChoiceFactionWeapon ($dataVehicle['id'], $idNav, $dataVehicle['idFaction']);
           
            }
        }
        else {
            $this->printingOnServiceOneVehicle ($dataVehicle);
        }
    }
    private function formAddVehicleInArmyList ($idVehicle, $idArmyList, $idNav, $nameVehicle) {
        echo '<form action="'.encodeRoutage(123).'" method="post">';
        echo '<h4>Ajouter '.$nameVehicle.'</h4>';
        echo '<label for="nbr">Nombre</label>';
        echo '<select name="nbr">';
        for ($i=1; $i <=4 ; $i++) { 
                echo '<option value="'.$i.'">'.$i.'</option>';
        }
        echo '</select>';
        echo '<input type="hidden" name="idVehicle" value="'.$idVehicle.'"/>
            <input type="hidden" name="idArmyList" value="'.$idArmyList.'"/>
            <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Ajouter</button>
        </form>';
    }
    public function affectedVehicleArmyList ($idFaction, $idArmyList, $idNav) {
        $dataVehicle = $this->getAllVehicleOfFactionForArmyList ($idFaction);
        echo '<details>';
        echo '<summary class="titleSite">';
            echo 'Ajouter Véhicules';
        echo '</summary>';
       // echo '<h4>Ajouter des véhicules</h4>';
        foreach ($dataVehicle  as $dataOneVehicle) {
            $this->formAddVehicleInArmyList ($dataOneVehicle['id'], $idArmyList, $idNav, $dataOneVehicle['nameVehicle']);
            $this-> printingOnServiceOneVehicle ($dataVehicle[0]);
        }
        echo '</details>';
    }
    private function deleteGroupForm ($data) {
        echo '<div class="IndividualPrice">';
            echo '<form action="'.encodeRoutage(125).'" method="post">
                    <input type="hidden" name="idVehicle" value="'.$data[1].'"/>
                    <input type="hidden" name="idList" value="'.$data[0].'"/>
                    <input type="hidden" name="idJoinMiniatureArmyList" value="'.$data[2].'"/>
                    <button class="buttonForm" type="submit" name="idNav" value="'.$data[3].'">Surpression du groupe</button>
                </form>';
        echo '</div>';  
    }
    public function displayAffectedInListVehicle ($idList, $idNav) {
       $dataVehicles = $this->getAllVehicleOfOneArmyList ($idList);
       if(!empty($dataVehicles)) {
        echo '<details>';
        echo '<summary class="titleSite">';
        echo 'Groupes de Véhicules';
        echo '</summary>';
        echo '<h3>Les véhicules</h3>';
       }
       foreach ($dataVehicles as $dataVehicle) {
        $moving = $this->movingSolveVehicle($dataVehicle['moving']);
        $groupPrice = $dataVehicle['nbr'] * $dataVehicle['price'];
        echo '<div class="displayElementOfList">
        <div class="Identity">
    
        <div> <img class="imgMini" src="sources/pictures/miniaturesPictures/'.$dataVehicle['namePicture'].'" alt="'.$dataVehicle['nameVehicle'].'"/></div>
        <div>'.$dataVehicle['nameVehicle'].'</div>
        </div>
        <div class="Stat">
            <div>DQM '.$this->getArray($this->dice, $dataVehicle['dqm'], 'nameDice').'</div>
            <div>DC '.$this->getArray ($this->dice, $dataVehicle['dc'], 'nameDice') .'</div>
            <div>Svg '.$this->getArray($this->armour, $dataVehicle['armor'], 'nameArmour').'</div>
            <div>PdV '.$this->getArray($this->structurePoint, $dataVehicle['structurePoint'], 'Structure').'</div>
        </div>
        <div class="Move">
            <div>Mouvement <strong>'.$moving[0].'" / '.$moving[1].' " + 1D4"</strong></div>
            <div>Vol <strong>'.$this->getArray($this->yes, $dataVehicle['fligt'], 'name').'</strong></div>
            <div>Vol stationnaire <strong>'.$this->getArray($this->yes, $dataVehicle['stationnaryFligt'], 'name').'</strong></div>
        </div>
        <div class="Nbr">
        <div>Nombre '.$dataVehicle['nbr'].'</div>
        <div>Prix du groupe  '.round($groupPrice, 0).' $</div>
        <div>Prix individuel '.round($dataVehicle['price'], 0).' $</div>
        </div>';
        $dataForm = [$idList, $dataVehicle['idVehicle'], $dataVehicle['idGroup'], $idNav];
        $this->deleteGroupForm ($dataForm);
    echo '</div>';  
       }
       echo '</details>';

    }

}
