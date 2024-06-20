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
    private function selectPriceSpecialRules () {
        echo '<label for="price">What type of special rule does this apply to?</label>';
        echo '<select id="price" name="price">';
 
        for ($i=0; $i <count($this->priceSpecialRules) ; $i++) { 
            echo '<option value="'.$i.'">'.$this->priceSpecialRules[$i]['level'].' - '.$this->priceSpecialRules[$i]['price'].'</option>';
        }
           
        echo '</select>';
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
                        echo '<td><a href="'.findTargetRoute(165).'&idRS='.$value['id'].'">Administrer</a></td>';
                    echo '</tr>';
                    }
                echo '</table>';
            echo '</article>';
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
    }
}
