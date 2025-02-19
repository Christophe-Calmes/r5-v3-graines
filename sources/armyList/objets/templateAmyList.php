<?php
require('sources/armyList/objets/sqlArmyList.php');
require ('sources/weapons/objects/TemplateWeaponsPublic.php');
require_once ('sources/miniatures/objets/templatesMiniatures.php');
require_once ('sources/vehicles/objets/TemplatesVehicles.php');
class TemplateAmyList extends SQLArmyList 
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
    private function getArray ($array, $index, $exitValue) {
        $index = $index - 1;
        return $array[$index][$exitValue];
    }
    public function formAddArmyList ($idNav) {
        echo '<form class="customerForm" action="'.encodeRoutage(121).'" method="post" enctype="multipart/form-data">';
        echo '<h3>Nouvelle compagnie</h3>';
        echo '<label for="nameArmyList">Nom</label>';
        echo '<input id="nameArmyList" name="nameArmyList" placeholder="Nom de votre liste"/>';
        $ownerFactions = new TemplateWeaponsPublic ();
        $ownerFactions->factionSelect ();
        $this->globalSelect ('Escarmouche', 'skirmich', $this->yes, 'name');
        echo ' <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Créer</button>';
        echo '</form>';
    }
    private function formDeleteList ($data) {
        echo '<form action="'.encodeRoutage($data[2]).'" method="post">
                <input type="hidden" name="idList" value="'.$data[0].'"/>
                <button class="buttonForm" type="submit" name="idNav" value="'.$data[1].'">Surpression liste</button>
            </form>';
}
    public function ArmyListOfOneFaction ($idFaction, $idNav) {
        $dataList = $this->getArmyListOfOneFaction ($idFaction);
        if(!empty($dataList)) {
            echo '<h3>Liste des compagnies</h3>';
            echo '<article class="flex-center">';
            echo '<table  class="tableWebSite">';
             echo '<tr>';
                echo '<th>Nom</th>';
                echo '<th>Escarmouche</th>';
                echo '<th>Nombre de figurine</th>';
                echo '<th>Nombre de véhicule</th>';
                echo '<th>Prix</th>';
                echo '<th>Administration</th>';
                echo '<th>Effacer</th>';
             echo '</tr>';
             foreach ($dataList as $value) {
                echo '<tr>';
                    echo '<td>'.$value['nameArmyList'].'</td>';
                    echo '<td>'.$this->getArray ($this->yes, $value['skirmich'], 'name') .'</td>';
                    echo '<td>'.$this->numbreOfMiniature ($value['id']).'</td>';
                    if($value['skirmich'] == 1) {
                        $message =  $this->numbreOfVehicle ($value['id']);
                    } else {
                        $message = 'Pas de véhicule';
                    }
                    echo '<td>'.$message.'</td>';
                    echo '<td>'.$this->listPrice ($value['id']).' $</td>';
                    echo '<td>
                            <a href="'.findTargetRoute(201).'&idArmyList='.$value['id'].'">Administrer</a>
                            <a href="'.findTargetRoute(203).'&idArmyList='.$value['id'].'">Imprimer la liste</a>
                        </td>';
                    echo '<td>';
                        $this->formDeleteList ([$value['id'], $idNav, 127]);
                    echo'</td>';
             echo '</tr>';
             }
             echo '</table>'; 
        } else {
            echo '<article><a href="'.findTargetRoute(198).'">Ajouter une compagnie</a></article>';
        }
    }

    public function oneArmyListDashboard ($idArmyList, $idNav) {

        $value = $this->getOneArmyList ($idArmyList)[0];
        echo '<article class="flex-center">';
            echo '<table  class="tableWebSite">';
            echo '<tr>';
                echo '<th>Nom</th>';
                echo '<th>Escarmouche</th>';
                echo '<th>Nombre de figurine</th>';
                echo '<th>Nombre de véhicule</th>';
                echo '<th>Prix</th>';
                echo '<th>Administration</th>';
            echo '</tr>';
            echo '<tr>';
                echo '<td>'.$value['nameArmyList'].'</td>';
                echo '<td>'.$this->getArray ($this->yes, $value['skirmich'], 'name') .'</td>';
                echo '<td>'.$this->numbreOfMiniature ($value['id']).'</td>';
                if($value['skirmich'] == 1) {
                    $message =  $this->numbreOfVehicle ($value['id']);
                } else {
                    $message = 'Pas de véhicule';
                }
                echo '<td>'.$message.'</td>';
                echo '<td>'.$this->listPrice ($value['id']).' $</td>';
                echo '<td>';
                    $this->formDeleteList ([$value['id'], $idNav, 126]);
                    echo '<a href="'.findTargetRoute(203).'&idArmyList='.$value['id'].'">Imprimer la liste</a>';
                echo '</td>';
            echo '</tr>';
            echo '</table>';
        echo '</article>';
        echo '<article class="flex-center">';
        echo '</article>';
    }
    public function printingIntroduction ($idList, $type) {
        // $type = true => battle / $type = false => shirmish
        $miniature = new templatesMiniatures ();
        echo '<aside class="dataSheetBox">';
            echo '<h4>'.$this->getNameArmyList ($idList).'</h4>';
            echo '<ul class="listeProfil">';
                echo '<strong><li>Prix '.$this->listPrice ($idList).' $</li>';
                echo '<li>Commandement '.$miniature->numbreMiniatureCommandPoint ($idList).'</li>';
                echo '<li>Nombre de figurine '.$this->numbreOfMiniature ($idList).'</li>';
                if($type) {
                    echo '<li>Nombre de véhicle '.$this->numbreOfVehicle ($idList).'</li></<strong>';
                }
            echo '</ul>';
        echo '</aside>';
    }
    public function printMiniatures ($idList) {
        $dataMiniatures = $this->getIdMiniatureList ($idList);
        if(!empty($dataMiniature)) {
            echo '<h3>Liste de figurines</h3>';
        }
        $miniature = new templatesMiniatures ();
        foreach ($dataMiniatures as $value) {
            echo '<article>';
            echo '<p>Nombre : '.$value['nbr'].'</p>';
                $miniature->displayOneMiniatureDatasheet ($value['idminiature'], 1, 2);
            echo '</article>';
        }
    }
    public function printVehicle ($idList) {
        $dataVehicles = $this->getIdVehicleList($idList);
        if(!empty($dataVehicle)) {
            echo '<h3>Liste de véhicules</h3>';
        }
        $vehicle = new  TemplatesVehicles ();
        foreach ($dataVehicles as $value) {
                echo '<p>Nombre : '.$value['nbr'].'</p>';
                    $vehicle->printingOneVehicleDatasheet ($value['idVehicle']);
        }
    }
}
