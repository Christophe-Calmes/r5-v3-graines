<?php
require('sources/miniatures/objets/sqlMiniatures.php');
require_once ('sources/weapons/objects/TemplateWeaponsPublic.php');
require_once ('sources/specialRules/objects/TemplatesSpecialRules.php');
class templatesMiniatures extends sqlMiniatures
{
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
    private function getArray ($array, $index, $exitValue) {
        $index = $index - 1;
        return $array[$index][$exitValue];
    }
    public function miniatureForm ($idNav) {
    $factionMiniature = new TemplateWeaponsPublic ();
    echo '<form class="customerForm" action="'.encodeRoutage(96).'" method="post" enctype="multipart/form-data">';
    echo '<h3>Créer une nouvelle figurine</h3>';
    $factionMiniature->factionSelect (); 
    echo '<label for="nameMiniature">Nom</label>';
    echo '<input id="nameMiniature" name="nameMiniature" placeholder="Miniature name "/>';
    echo '<label for="move">Mouvement tactique</label>';
    echo '<input type="range" id="move" value="4" name="moving" min="0" max="12" step="1" oninput="updateRangeValue()"/>';
    echo '<div>Move : <span id="moveValue">4</span> " / <span id="runValue">6</span> " + 1D4"</div>';
    echo '<script>
        const updateRangeValue = () => {
            let moveValue = document.getElementById("move").value;
            let arrayMove = moveValue
            document.getElementById("moveValue").textContent = moveValue;
            document.getElementById("runValue").textContent = Math.round(moveValue * 1.45);
        }
    </script>';
    $this->globalSelect ('Dé de qualité martial', 'dqm', $this->dice, 'nameDice');
    $this->globalSelect ('Dé de combat', 'dc', $this->dice, 'nameDice');
    $this->globalSelect ('Point de vie', 'healtPoint', $this->healtPoint, 'healtPoint');
    $this->globalSelect ('Sauvegarde / D6', 'armor',    $this->armour, 'nameArmour');
    $this->globalSelect ('Type de troupe', 'typeTroop', $this->typesTroupe, 'nameTroupe');
    $this->globalSelect ('Taille de la miniature', 'miniatureSize', $this->miniatureSize, 'NameSize');
    $this->globalSelect ('Vol', 'fligt', $this->yes, 'name');
    $this->globalSelect ('Vol stationnaire', 'stationnaryFligt', $this->yes, 'name');
    echo '<label for="picture">Image de la figurine</label>';
    echo '<input id="picture" type="file" name="namePicture" accept="image/png, image/jpeg, image/webp"/>';
    echo ' <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Créer une nouvelle figurine</button>';
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
                echo '<th>Nom</th>';
                echo '<th>Type</th>';
                echo '<th>Taille de la figurine</th>';
                echo '<th>DQM</th>';
                echo '<th>DC</th>';
                echo '<th>Mouvement</th>';
                echo '<th>Vol</th>';
                echo '<th>PdV</th>';
                echo '<th>Sauvegarde</th>';
                echo '<th>Prix</th>';
                echo '<th>Administration</th>';
                echo '<th>Effacer</th>';
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
                    echo '<td><a href="'.findTargetRoute(188).'&idMiniature='.$value['id'].'">Mettre à jour</a></td>';
                    echo '<td>
                        <form action="'.encodeRoutage(97).'" method="post">
                        <input type="hidden" name="idMiniature" value="'.$value['id'].'"/>
                        <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Effacer</button>
                        </form>
                    </td>';
             echo '</tr>';
             }
            echo '</table>';
            echo '</article>';
        }
        
        echo '<article><a href="'.findTargetRoute(185).'">Ajouter une nouvelle figurine</a></article>';
        
    }
    public function displayMiniatureOfOneFactionInService ($idFaction, $valid, $idNav) {
        $dataMiniature = $this->getMiniatureOfOneFactionInService ($idFaction, $valid);
        
        if(!empty($dataMiniature)) {
            echo '<article class="flex-center">';
            echo '<table  class="tableWebSite">';
             echo '<tr>';
             
                echo '<th>Nom</th>';
                echo '<th>Type</th>';
                echo '<th>Taille</th>';
                echo '<th>DQM</th>';
                echo '<th>DC</th>';
                echo '<th>Mouvement</th>';
                echo '<th>Vol</th>';
                echo '<th>PdV</th>';
                echo '<th>Sauvegarde</th>';
                echo '<th>Prix</th>';
                echo '<th>Voir</th>';
                echo '<th>Mettre à jour</th>';
                echo '<th>Effacer</th>';
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
                    echo '<td><a href="'.findTargetRoute(188).'&idMiniature='.$value['id'].'">Voir la fiche</a></td>';
                    echo '<td>
                        <form action="'.encodeRoutage(107).'" method="post">
                        <input type="hidden" name="idMiniature" value="'.$value['id'].'"/>
                        <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Au repos</button>
                        </form>
                    </td>';
                    echo '<td>
                        <form action="'.encodeRoutage(97).'" method="post">
                        <input type="hidden" name="idMiniature" value="'.$value['id'].'"/>
                        <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Effacere</button>
                        </form>
                    </td>';
             echo '</tr>';
             }
            echo '</table>';
            echo '</article>';
        } else {
            echo '<h4>Aucune figurine en service</h4>';
        }
        
        echo '<article><a href="'.findTargetRoute(185).'">Ajouter une nouvelle figurine</a></article>';
        
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
                            echo '<td>Prix : '.round($dataMiniature['price']).' $</td>';
                            echo '<td>Type : '.$this->getArray ($this->typesTroupe, $dataMiniature['typeTroop'], 'nameTroupe') .'</td>';
                            echo '<td>Nom :'.$dataMiniature['nameMiniature'].'</td>';
                            echo '<td>Taille figurine : '.$this->getArray ($this->miniatureSize, $dataMiniature['miniatureSize'], 'NameSize') .'</td>';
                        echo '</tr>';
                        echo '<tr>';
                            echo '<td class="blue">DQM : '.$this->getArray ($this->dice, $dataMiniature['dqm'], 'nameDice').$bonus.'</td>';
                            echo '<td class="red"> DC : '.$this->getArray ($this->dice, $dataMiniature['dc'], 'nameDice') .'</td>';
                            echo '<td class="orange">PdV : '.$this->getArray ($this->healtPoint, $dataMiniature['healtPoint'], 'healtPoint') .'</td>';
                            echo '<td class="codexGrey">Sauvegarde : '.$this->getArray ( $this->armour, $dataMiniature['armor'], 'nameArmour').$bonusSVG.' /1D6</td>';
                        echo '</tr>';
                        echo '<tr class="green">';
                            echo '<td>Mouvement tactique : '.$moving[0].' "</td>';
                            echo '<td>Course : '.$moving[1].'" + 1D4"</td>'; 
                            echo '<td>Vol : '.$this->getArray ($this->yes, $dataMiniature['fligt'], 'name') .'</td>';
                            echo '<td>Vol stationnaire : '.$this->getArray ($this->yes, $dataMiniature['stationnaryFligt'], 'name') .'</td>';
                        echo '</tr>';
                    echo '</table>';
                $printSpecialRules = new TemplatesSpecialRules ();
                $printSpecialRules->displaySpecialRules ($dataMiniature['idMiniature'], 1);
            echo '</article>';
        } else {
            echo '<article><a href="'.findTargetRoute(185).'">Ajouter une nouvelle figurine</a></article>';
        }
    }
    public function displayOneMiniatureDatasheet ($idMiniature, $valid, $stick) {
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
        echo '<section class="centerDatasheet">';
            echo '<article class="dataSheetBox">';
                echo '<div class="printVehicle">';
                echo '<div class="Picture">
                        <img class="imgCarouselAuto" src="sources/pictures/miniaturesPictures/'.$dataMiniature['namePicture'].'" alt="'.$dataMiniature['nameMiniature'].'"/>
                        </div>';
                echo '<div class="Name">
                        <div class="titlePrintDataSheet">Nom</div>
                        <div class="dataSheetInfoPrint">'.$dataMiniature['nameMiniature'].'
                    </div>
                    <div class="titlePrintDataSheet">Prix</div>
                        <div class="dataSheetInfoPrint">'.round($dataMiniature['price'], 0).' $</div>    
                </div>';
                echo '<div class="Type">
                        <div class="titlePrintDataSheet">Type</div>
                        <div class="dataSheetInfoPrint"> '.$this->getArray($this->typesTroupe, $dataMiniature['typeTroop'], 'nameTroupe').'</div>
                        <div class="titlePrintDataSheet">Taille</div>
                        <div class="dataSheetInfoPrint"> '.$this->getArray ($this->miniatureSize, $dataMiniature['miniatureSize'], 'NameSize') .'</div>
                    </div>';
                echo '<div class="DQM"><div class="titlePrintDataSheet">DQM</div>
                        <div class="dataSheetInfoPrint"> '.$this->getArray($this->dice, $dataMiniature['dqm'], 'nameDice').$bonus.'</div>
                     </div>';
                echo '<div class="Structure"><div class="titlePrintDataSheet">Point de vie </div><div class="dataSheetInfoPrint">'.$this->getArray($this->healtPoint, $dataMiniature['healtPoint'], 'healtPoint').'</div></div>';   
                
                echo '<div class="Armor"><div class="titlePrintDataSheet">Sauvegarde</div>
                        <div class="dataSheetInfoPrint">'.$this->getArray($this->armour, $dataMiniature['armor'], 'nameArmour').$bonusSVG.'</div>
                    </div>';
                echo '<div class="Move">
                    <div class="titlePrintDataSheet">Mouvement</div>
                    <div class="dataSheetInfoPrint">
                    <ul class="listClass">
                        <li>Mouvement : <strong>'.$moving[0].'" / '.$moving[1].' " + 1D4"</strong></li>
                        <li>Vol :  <strong>'.$this->getArray($this->yes, $dataMiniature['fligt'], 'name').'</strong></li>
                        <li>Vol stationnaire : <strong>'.$this->getArray($this->yes, $dataMiniature['stationnaryFligt'], 'name').'</strong></li>
                    </ul>
                    </div>
                    </div>
                    </div>';
            $specialRulesVehicle = new TemplatesSpecialRules ();
            $specialRulesVehicle->printSpecialRulesMiniature ($idMiniature);
            $listWeapon = new TemplateWeaponsPublic ();
            $face = $this->getArray($this->dice, $dataMiniature['dc'], 'faces');
            $listWeapon->printMiniatureWeaponDatasheet ($idMiniature, $face);
            echo '</article>';
        echo '</section>';
    }
    public function updateMiniatureByUser ($idMiniature, $valid, $idNav, $stick) {
        $data =  $this->getOneMiniature ($idMiniature, $valid, $stick);
       $data = $data[0];
        $factionMiniature = new TemplateWeaponsPublic ();
        echo '<form class="customerForm" action="'.encodeRoutage(99).'" method="post" enctype="multipart/form-data">';
        echo '<h3>Mettre à jour : '.$data['nameMiniature'].'</h3>';
            $factionMiniature->factionSelected ($data['idFaction']); 
        echo '<label for="nameMiniature">Nom</label>';
        echo '<input id="nameMiniature" name="nameMiniature" value="'.$data['nameMiniature'].'"/>';
        echo '<label for="move">Mouvement</label>';
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
        $this->globalSelected ('DQM', 'dqm', $this->dice, 'nameDice', $data['dqm']);
        $this->globalSelected ('DC', 'dc', $this->dice, 'nameDice', $data['dc']);
        $this->globalSelected ('PdV', 'healtPoint', $this->healtPoint, 'healtPoint', $data['healtPoint']);
        $this->globalSelected ('Sauvegarde / D6', 'armor', $this->armour, 'nameArmour', $data['armor']);
        $this->globalSelected ('Type', 'typeTroop', $this->typesTroupe, 'nameTroupe', $data['typeTroop']);
        $this->globalSelected ('Taille', 'miniatureSize', $this->miniatureSize, 'NameSize', $data['miniatureSize']);
        $this->globalSelected ('Vol', 'fligt', $this->yes, 'name', $data['fligt']);
        $this->globalSelected ('Vol stationnaire', 'stationnaryFligt', $this->yes, 'name', $data['stationnaryFligt']);
        echo '<input type="hidden" name="idMiniature" value="'.$data['idMiniature'].'"/>';
        echo ' <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Mettre à jour</button>';
        echo '</form>';
        echo '<form action="'.encodeRoutage(103).'" method="post">
                <input type="hidden" name="idMiniature" value="'.$data['idMiniature'].'"/>
                <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Fix</button>
            </form>';
    }
    public function goodForService ($idMiniature, $idNav) {
        echo '<form action="'.encodeRoutage(106).'" method="post">
                <input type="hidden" name="idMiniature" value="'.$idMiniature.'"/>
                <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Bon pour le service</button>
            </form>';
    }
    public function listMiniatureChoiceGlobalWeapon ($idMiniature, $idNav)  {
        $listWeapon = new TemplateWeaponsPublic ();
        echo '<h2>Armes globale</h2>';
        $weaponName = [' contact', 'tir',  'souffle'];
        for ($i=0; $i <=2 ; $i++) { 
            echo ' <article class="flex-colonne-form">';
            echo '<details>';
            echo '<summary class="titleSite">
            Armes de '.$weaponName[$i].'
            </summary>
                    <h4>Liste armes de'.$weaponName[$i].' </h4>';
                    $listWeapon->listWeaponForChoiceUserGlobal ($i, $idMiniature, $idNav, false);
                echo '</details>';
            echo '</article>';
        }
    }

    public function listMiniatureChoiceFactionWeapon ($idMiniature, $idNav, $idFaction)  {
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
                    $listWeapon->listWeaponFactionForChoiseUser ($i, $idMiniature, $idFaction, $idNav, false);
                echo '</details>';
            echo '</article>';
        }
    }
    private function formAddMiniatureInArmyList ($idMiniature, $idArmyList, $idNav, $nameMiniature) {
        echo '<form action="'.encodeRoutage(122).'" method="post">';
        echo '<h4>Ajouter '.$nameMiniature.'</h4>';
        echo '<label for="nbr">Nombre</label>';
        echo '<select name="nbr">';
        for ($i=1; $i <=12 ; $i++) { 
                echo '<option value="'.$i.'">'.$i.'</option>';
        }
        echo '</select>';
        echo '<input type="hidden" name="idMiniature" value="'.$idMiniature.'"/>
            <input type="hidden" name="idArmyList" value="'.$idArmyList.'"/>
            <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Ajouter</button>
        </form>';
    }

    public function affectedMiniatureArmyList ($idFaction, $idArmyList, $idNav) {
        $dataMiniature = $this->getAllIdMiniatureOfFactionForArmyList ($idFaction);
        echo '<details>';
        echo '<summary class="titleSite">';
            echo 'Ajouter Figurines';
        echo '</summary>';
        foreach ($dataMiniature as  $value) {
            $this->formAddMiniatureInArmyList ($value['id'], $idArmyList, $idNav, $value['nameMiniature'] );
            $this->displayOneMiniatureDatasheet ($value['id'], $value['valid'], $value['stick']);
        }
        echo '</details>';
    }
    private function deleteGroupForm ($data) {
            echo '<div class="IndividualPrice">';
                echo '<form action="'.encodeRoutage(124).'" method="post">
                        <input type="hidden" name="idMiniature" value="'.$data[1].'"/>
                        <input type="hidden" name="idList" value="'.$data[0].'"/>
                        <input type="hidden" name="idJoinMiniatureArmyList" value="'.$data[2].'"/>
                        <button class="buttonForm" type="submit" name="idNav" value="'.$data[3].'">Surpression du groupe</button>
                    </form>';
            echo '</div>';
    }

    public function displayAffectedInListMiniature ($idList, $idNav) {
        $dataMiniatureOfOneList = $this->getAllMiniatureOfOneList ($idList);
        if(!empty($dataMiniatureOfOneList)) {
            echo '<details>';
            echo '<summary class="titleSite">';
            echo 'Groupes de Figurines';
            echo '</summary>';
            echo '<h3>Détails des figurines de la liste</h3>';
           }

        foreach ($dataMiniatureOfOneList as $value) {
            $dataForm = [$idList, $value['idMiniature'], $value['idJoinMinitureArmyList'] ,$idNav];
            $moving = $this->movingSolve ($value['moving']);
            $bonus = null;
            $bonusSVG = null;
            if($value['typeTroop']>3) {
                $bonus = '++';
            }
            if($value['typeTroop']==5) {
                $bonusSVG = '+';
            }
            $groupPrice = $value['nbr'] * $value['price'];
            echo '<div class="displayElementOfList">
                    <div class="Identity">
                
                    <div> <img class="imgMini" src="sources/pictures/miniaturesPictures/'.$value['namePicture'].'" alt="'.$value['nameMiniature'].'"/></div>
                    <div>'.$value['nameMiniature'].'</div>
                    </div>
                    <div class="Stat">
                        <div>DQM '.$this->getArray($this->dice, $value['dqm'], 'nameDice').$bonus.'</div>
                        <div>DC '.$this->getArray ($this->dice, $value['dc'], 'nameDice') .'</div>
                        <div>Svg '.$this->getArray($this->armour, $value['armor'], 'nameArmour').$bonusSVG.'</div>
                        <div>PdV '.$this->getArray($this->healtPoint, $value['healtPoint'], 'healtPoint').'</div>
                    </div>
                    <div class="Move">
                        <div>Mouvement <strong>'.$moving[0].'" / '.$moving[1].' " + 1D4"</strong></div>
                        <div>Vol <strong>'.$this->getArray($this->yes, $value['fligt'], 'name').'</strong></div>
                        <div>Vol stationnaire <strong>'.$this->getArray($this->yes, $value['stationnaryFligt'], 'name').'</strong></div>
                    </div>
                    <div class="Nbr">
                    <div>Nombre '.$value['nbr'].'</div>
                    <div>Prix du groupe  '.round($groupPrice, 0).' $</div>
                    <div>Prix individuel '.round($value['price'], 0).' $</div>
                    </div>';
                        $this->deleteGroupForm ($dataForm);
                echo '</div>';   
        }
        echo '</details>';
    }
    public function displayWeaponNoFaction ($firstPage, $MiniatureByPage, $idNav) {
        $nbrMiniature =  $this->numberOfNotAffectedMiniatureInFaction ();
        if($nbrMiniature > 0) {
        $data = $this->miniatureNoFactionOnePage ($firstPage, $MiniatureByPage);
            $factionMiniature = new TemplateWeaponsPublic ();
            echo '<form class="customerForm" action="'.encodeRoutage(99).'" method="post" enctype="multipart/form-data">';
            echo '<div> <img class="imgMini" src="sources/pictures/miniaturesPictures/'.$data['namePicture'].'" alt="'.$data['nameMiniature'].'"/></div>';
            echo '<h3>Mettre à jour : '.$data['nameMiniature'].'</h3>';
                $factionMiniature->factionSelect ($data['idFaction']); 
            echo '<label for="nameMiniature">Nom</label>';
            echo '<input id="nameMiniature" name="nameMiniature" value="'.$data['nameMiniature'].'"/>';
            echo '<label for="move">Mouvement</label>';
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
            $this->globalSelected ('DQM', 'dqm', $this->dice, 'nameDice', $data['dqm']);
            $this->globalSelected ('DC', 'dc', $this->dice, 'nameDice', $data['dc']);
            $this->globalSelected ('PdV', 'healtPoint', $this->healtPoint, 'healtPoint', $data['healtPoint']);
            $this->globalSelected ('Sauvegarde / D6', 'armor', $this->armour, 'nameArmour', $data['armor']);
            $this->globalSelected ('Type', 'typeTroop', $this->typesTroupe, 'nameTroupe', $data['typeTroop']);
            $this->globalSelected ('Taille', 'miniatureSize', $this->miniatureSize, 'NameSize', $data['miniatureSize']);
            $this->globalSelected ('Vol', 'fligt', $this->yes, 'name', $data['fligt']);
            $this->globalSelected ('Vol stationnaire', 'stationnaryFligt', $this->yes, 'name', $data['stationnaryFligt']);
            echo '<input type="hidden" name="idMiniature" value="'.$data['idMiniature'].'"/>';
            echo ' <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Mettre à jour</button>';
            echo '</form>';
            echo ' <form action="'.encodeRoutage(97).'" method="post">
                        <input type="hidden" name="idMiniature" value="'.$data['idMiniature'].'"/>
                        <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Effacer</button>
                    </form>';
       
        } else {
            echo '<h3>Aucune figurines sans faction dans la base</h3>';
        }

    }

}
