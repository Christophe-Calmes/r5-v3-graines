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
}
