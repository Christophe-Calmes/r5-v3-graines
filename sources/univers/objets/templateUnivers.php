<?php
require ('sqlUnivers.php');

class TemplateUnivers extends SQLUnivers 
{

    public function __construct () {
        parent::__construct();
   
    }
    private function numberOfUnivers ($valid) {
        $numberOfUnivers = $this->countYourUnivers($valid);
        echo '<article>Univers = '.$numberOfUnivers[0]['nbrUnivers'].' / '.$this->maxOfUnivers.'</article>';
    }
    private function displayFactionsOfOneUnivers ($dataFactions) {
        if($dataFactions == []) {
            echo '<p>Aucune faction dans la base</p>';
        } else {
            echo '<aside class="flex-colonne">';
            echo '<p><strong class="codexGrey underLine">Factions</strong></p>';
            foreach ($dataFactions as  $value) {
                echo '<div>'.$value['nomFaction'].'</div>';
            }
            echo '</aside>';
        }
    }
    protected function displayListOfYourUnivers ($valid) {
        $dataUnivers = $this->listOfYourUnivers ($valid);
        echo '<article class="gallery">';
            foreach($dataUnivers as $value) {
                echo '<div class="item">
                <a href="'.findTargetRoute(156).'&idUnivers='.$value['idUnivers'].'">Name : '.$value['nameUnivers'].' - NT: '.$value['nt'].'</a>';
                $dataFactions = $this->listOfFaction ($value['idUnivers']);
                $this->displayFactionsOfOneUnivers ($dataFactions);
                echo '</div>';
            }
        echo '</article>';
    }
    public function addUniversForm ($idNav) {
        echo '<form class="customerForm" action="'.encodeRoutage(66).'" method="post">';
            echo '<label for="nameUnivers">Nom</label>';
            echo '<input id="nameUnivers" name="nameUnivers" placeholder="New name univers"/>';
            echo '<label for="nt">Niveau Technologique (NT)</label>';
            echo '<select for="nt" name="nt">';
                for ($i=0; $i <count($this->nt) ; $i++) { 
                    if($i == 8) {
                        echo '<option value="'.$i.'" selected>8</option>';
                    } else {
                        echo '<option value="'.$i.'">'.$i.'</option>';
                    }
                }
            echo '</select>';
            echo '<button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Créer</button>';
        echo '</form>';
        echo '<article class="customerForm">';
        $this->numberOfUnivers(1);
        $this->displayListOfYourUnivers (1);
        echo '</article>';
    }
    public function displayOneUniversUpdateForm ($idUnivers, $valid, $idNav) {
        $dataUnivers = $this->getOneUnivers ($idUnivers, $valid);
       
        echo '<form class="customerForm" action="'.encodeRoutage(67).'" method="post">';
            echo '<h3>Présentation</h3>';
            echo '<p>Nom :'.$dataUnivers[0]['nameUnivers'].'</p>
                  <p>NT: '.$dataUnivers[0]['nt'].'</p>';
            echo '<label for="nameUnivers">Nom</label>';
            echo '<input id="nameUnivers" name="nameUnivers" value="'.$dataUnivers[0]['nameUnivers'].'"/>';
            echo '<label for="nt">NT</label>';
            echo '<select for="nt" name="nt">';
                for ($i=0; $i <count($this->nt) ; $i++) { 
                    echo '<option value="'.$i.'">'.$this->nt[$i].'</option>';
                    if($i == $dataUnivers[0]['nt']) {
                        echo '<option value="'.$i.'" selected>'.$this->nt[$i].'</option>';
                    }
                }
            echo '</select>';
            echo '<input type="hidden" name="id" value="'.$dataUnivers[0]['idUnivers'].'"/>';
            echo '<button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Mettre à jour '.$dataUnivers[0]['nameUnivers'].'</button>';
        echo '</form>';
        echo '<form class="customerForm" action="'.encodeRoutage(68).'" method="post">';
        echo '<input type="hidden" name="id" value="'.$dataUnivers[0]['idUnivers'].'"/>';
        echo '<button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Effacer '.$dataUnivers[0]['nameUnivers'].'</button>';
    echo '</form>';
    }
}
