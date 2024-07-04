<?php
require('sources/specialRules/objects/SQLspecialRules.php');
class TemplatesSpecialRules extends SQLspecialRules
{
    private function selectTypeSpecialRules () {
        echo '<label for="typeSpecialRules">What type of special rule does this apply to?</label>';
        echo '<select id="typeSpecialRules" name="typeSpecialRules">';
            for ($i=0; $i <count($this->specialRulesType) ; $i++) { 
                echo '<option value="'.$i.'">'.$this->specialRulesType[$i].'</option>';
            }
        echo '</select>';
    }
    private function selectTypeSpecialRulesUpdate ($last) {
        echo '<label for="typeSpecialRules">What type of special rule does this apply to?</label>';
        echo '<select id="typeSpecialRules" name="typeSpecialRules">';
            for ($i=0; $i <count($this->specialRulesType) ; $i++) { 
               
                if($last == $i) {
                    echo '<option value="'.$i.'" selected>'.$this->specialRulesType[$i].'</option>';
                } else {
                    echo '<option value="'.$i.'">'.$this->specialRulesType[$i].'</option>';
                }
            }
        echo '</select>';
    }
    private function selectPriceSpecialRules () {
        echo '<label for="price">What type of special rule does this apply to?</label>';
        echo '<select id="price" name="price">';
 
        for ($i=0; $i <count($this->priceSpecialRules) ; $i++) { 
            echo '<option value="'.$i.'">'.$this->priceSpecialRules[$i]['level'].' - '.$this->priceSpecialRules[$i]['price'].'</option>';
        }
           
        echo '</select>';
    }
    private function selectPriceSpecialRulesUpdate ($last) {
        $index = array_search($last, array_column($this->priceSpecialRules, 'price'));
        echo '<label for="price">What type of special rule does this apply to?</label>';
        echo '<select id="price" name="price">';
 
        for ($i=0; $i <count($this->priceSpecialRules) ; $i++) { 
            if($index == $i) {
            echo '<option value="'.$i.'" selected>'.$this->priceSpecialRules[$i]['level'].' - '.$this->priceSpecialRules[$i]['price'].'</option>';
            } else {
            echo '<option value="'.$i.'">'.$this->priceSpecialRules[$i]['level'].' - '.$this->priceSpecialRules[$i]['price'].'</option>';
            }
        }
           
        echo '</select>';
    }
    private function selectValid ($state) {
        echo '<label for="valid">valid status ?</label>';
        echo '<select id="valid" name="valid">';
            for ($i=0; $i <count($this->yes) ; $i++) { 
                if($i == $state) {
                    echo '<option value="'.$i.'" selected>'.$this->yes[$i].'</option>';
                } else {
                    echo '<option value="'.$i.'">'.$this->yes[$i].'</option>';
                }
            }
        echo '</select>';
    }
    private function adminOneRS ($dataOneRule, $idNav) {
        echo '<article>';
            echo '<form action="'.encodeRoutage(73).'" method="post">';
            echo '<input type="hidden" name="idRS" value="'.$dataOneRule[0]['id'].'"/>';
                    echo '<table class="tableWebSite">';
                        echo '<tr>';
                            echo '<td>Type : '; $this->selectTypeSpecialRulesUpdate ($dataOneRule[0]['typeSpecialRules']); echo'</td>';
                            echo '<td>Name : <input id="nameSpecialRules" name="nameSpecialRules" value="'.$dataOneRule[0]['nameSpecialRules'].'"/></td>';
                        echo '</tr>';
                        echo '<tr>';
                                echo '<td colspan="2"><textarea name="descriptionSpecialRules" id="descriptionSpecialRules" cols="221" rows="10">
'.$dataOneRule[0]['descriptionSpecialRules'].'</textarea></td>';
                            echo '</tr>';
                            echo '<tr>';
                                echo '<td>Price : '; $this->selectPriceSpecialRulesUpdate ($dataOneRule[0]['price']); echo'</td>';
                                echo '<td>Valid : '; $this->selectValid ($dataOneRule[0]['valid']); echo'</td>';
                            echo '</tr>';
                            echo '<tr>
                                    <td class="red" colspan="2">
                                            <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Update '.$dataOneRule[0]['nameSpecialRules'].'</button>
                                        </form>
                                        <form action="'.encodeRoutage(74).'" method="post">
                                            <input type="hidden" name="idRS" value="'.$dataOneRule[0]['id'].'"/>
                                            <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Delete '.$dataOneRule[0]['nameSpecialRules'].'</button>
                                        </form>
                                    </td>
                                </tr>';
                    echo '</table>';
        echo '</article>';
    }
    public function formSpecialRules ($idNav) {
        echo '<form class="customerForm" action="'.encodeRoutage(72).'" method="post">';
        $this->selectTypeSpecialRules ();
        $this->selectPriceSpecialRules ();
        echo '<label for="nameSpecialRules">Name univers :</label>';
        echo '<input id="nameSpecialRules" name="nameSpecialRules" placeholder="Name of special rules ?"/>';
        echo '<label for="descriptionSpecialRules">Descrition of special rule</label>';
        echo '<textarea name="descriptionSpecialRules" id="descriptionSpecialRules" cols="30" rows="10">
Text ?
        </textarea>';
        echo '<button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Creat news special rules</button>';
        echo '</form>';
    }
    public function displaySRTitle ($firstPage,  $RSbyPage, $typeRS) {
        $datasRS = $this->getRS ($firstPage,  $RSbyPage, $typeRS);
        if(!empty($datasRS)) {
            echo '<article class="flex-center">';
                echo '<table class="tableWebSite">';
                    echo '<tr>';
                        echo '<th>Name</th>';
                        echo '<th>Price</th>';
                        echo '<th>Display</th>';
                    echo '</tr>';
                    foreach ($datasRS as $value) {
                    echo '<tr>';
                        echo '<td>'.$value['nameSpecialRules'].'</td>';
                        echo '<td>'.$value['price'].'</td>';
                        echo '<td><a href="'.findTargetRoute(165).'&idRS='.$value['id'].'">Administration</a></td>';
                    echo '</tr>';
                    }
                echo '</table>';
            echo '</article>';
        } else {
            echo '<article class="flex-center">';
                echo '<p>No data</p>';
            echo '</article>';
        }


    }
    public function publicDisplaySRTitle ($firstPage,  $RSbyPage, $typeRS) {
        $datasRS = $this->getRS ($firstPage,  $RSbyPage, $typeRS);
        if(!empty($datasRS)) {
            echo '<article class="flex-center">';
            echo '<table class="tableWebSite">';
                echo '<tr>';
                    echo '<th>Name</th>';
                    echo '<th>Price</th>';
                    echo '<th>Display</th>';
                echo '</tr>';
                foreach ($datasRS as $value) {
                echo '<tr>';
                    echo '<td>'.$value['nameSpecialRules'].'</td>';
                    echo '<td>'.$value['price'].'</td>';
                    echo '<td><a href="'.findTargetRoute(169).'&idRS='.$value['id'].'">Read</a></td>';
                echo '</tr>';
                }
            echo '</table>';
        echo '</article>';
        } else {
            echo '<article class="flex-center">';
                echo '<p>No data</p>';
            echo '</article>';
        }

    
    }
    public function setTypeRules ($typeRules) {
        return $this->specialRulesType[$typeRules];
    }
    public function displayOneRS ($idRS, $idNav) {
        $dataOneRule = $this-> getOneRS ($idRS);
        echo '<article>';
            echo '<table class="tableWebSite">';
                echo '<tr>';
                    echo '<td>Type : '.$this->specialRulesType[$dataOneRule[0]['typeSpecialRules']].'</td>';
                    echo '<td>Name : '.$dataOneRule[0]['nameSpecialRules'].'</strong></td>';
                echo '</tr>';
                echo '<tr>';
                        echo '<td colspan="2">'.$dataOneRule[0]['descriptionSpecialRules'].'</td>';
                    echo '</tr>';
                    echo '<tr>';
                        echo '<td>Price : '.$dataOneRule[0]['price'].'</td>';
                        echo '<td>Valid : '.$this->yes[$dataOneRule[0]['valid']].'</td>';
                    echo '</tr>';
            echo '</table>';
        echo '</article>';
        $this->adminOneRS ($dataOneRule, $idNav);
    }
    public function PublicDisplayOneRS ($idRS, $idNav) {
        $dataOneRule = $this-> getOneRS ($idRS);
        echo '<article>';
            echo '<table class="tableWebSite">';
                echo '<tr>';
                    echo '<td>Type : '.$this->specialRulesType[$dataOneRule[0]['typeSpecialRules']].'</td>';
                    echo '<td>Name : '.$dataOneRule[0]['nameSpecialRules'].'</strong></td>';
                echo '</tr>';
                echo '<tr>';
                        echo '<td colspan="2">'.$dataOneRule[0]['descriptionSpecialRules'].'</td>';
                    echo '</tr>';
                    echo '<tr>';
                        echo '<td>Price : '.$dataOneRule[0]['price'].'</td>';
                        echo '<td>Valid : '.$this->yes[$dataOneRule[0]['valid']].'</td>';
                    echo '</tr>';
            echo '</table>';
        echo '</article>';
    }
    public function displaySpecialRulesForChoose ($typeRS, $valid, $idWeapon, $idNav) {
        $dataSpecialsRules = $this->getAllRSforAffectation ($typeRS, $valid, $idWeapon);
        echo '<article>';
            echo '<h4 class="titleSite">Special rules assignable</h4>';
                echo '<table class="tableWebSite">';
        foreach ($dataSpecialsRules as $value) {
                    echo '<tr>';
                        echo '<td>Name : '.$value['nameSpecialRules'].'</strong></td>';
                        echo '<td>Price : '.$value['price'].'</td>';
                    echo '</tr>';
                    echo '<tr>';
                            echo '<td colspan="2">'.$value['descriptionSpecialRules'].'</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td colspan="2"><form action="'.encodeRoutage(78).'" method="post">
                                                <input type="hidden" name="idWeapon" value="'.$idWeapon.'"/>
                                                <input type="hidden" name="idSpecialRules" value="'.$value['idSpecialRule'].'"/>
                                                <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Assign '.$value['nameSpecialRules'].'</button>           
                                                </form>';
                            echo'</td>';
                        echo '</tr>';
        }
            echo '</table>';
        echo '</article>';
    }
    public function displayAssignSpecialRules ($idWeapon, $idNav) {
        $dataSRAssigned = $this->getAssignedSpecialRule ($idWeapon);
        if(!empty($dataSRAssigned)) {
        echo '<article>';
        echo '<h4 class="titleSite">Special rules assigned</h4>';
            echo '<table class="tableWebSite green">';
        foreach ($dataSRAssigned as $value) {
            echo '<tr>';
                echo '<td>Name : '.$value['nameSpecialRules'].'</strong></td>';
                echo '<td>Price : '.$value['price'].'</td>';
            echo '</tr>';
            echo '<tr>';
                    echo '<td colspan="2">'.$value['descriptionSpecialRules'].'</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td colspan="2"><form action="'.encodeRoutage(79).'" method="post">
                                        <input type="hidden" name="idWeapon" value="'.$idWeapon.'"/>
                                        <input type="hidden" name="idSpecialRules" value="'.$value['idSpecialRule'].'"/>
                                        <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Unassign '.$value['nameSpecialRules'].'</button>           
                                        </form>';
                    echo'</td>';
                echo '</tr>';
            }
                echo '</table>';
            echo '</article>';
        }
    }
    public function displaySpecialRules ($idWeapon, $idNav) {
        $dataSRAssigned = $this->getAssignedSpecialRule ($idWeapon);
        if(!empty($dataSRAssigned)) {
        echo '<article>';
        echo '<h4 class="titleSite">Special rules assigned</h4>';
            echo '<table class="tableWebSite green">';
        foreach ($dataSRAssigned as $value) {
            echo '<tr>';
                echo '<td>Name : '.$value['nameSpecialRules'].'</strong></td>';
                echo '<td>Price : '.$value['price'].'</td>';
            echo '</tr>';
            echo '<tr>';
                    echo '<td colspan="2">'.$value['descriptionSpecialRules'].'</td>';
                echo '</tr>';
            }
                echo '</table>';
            echo '</article>';
        }
    }

}
