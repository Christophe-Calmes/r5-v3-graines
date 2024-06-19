<?php
require ('sqlUnivers.php');

class TemplateUnivers extends SQLUnivers 
{

    public function __construct () {
        parent::__construct();
   
    }
    private function numberOfUnivers ($valid) {
        $numberOfUnivers = $this->countYourUnivers($valid);
        echo '<article>Your number of Univers = '.$numberOfUnivers[0]['nbrUnivers'].' / '.$this->maxOfUnivers.'</article>';
    }
    private function displayFactionsOfOneUnivers ($dataFactions) {
        if($dataFactions == []) {
            echo '<p>No factions have been found in the base.</p>';
        } else {
            echo '<lu class="listClass">';
            foreach ($dataFactions as  $value) {
                echo '<li>'.$value['nomFaction'].'</li>';
            }
            echo '</ul>';
        }
    }
    protected function displayListOfYourUnivers ($valid) {
        $dataUnivers = $this->listOfYourUnivers ($valid);
        echo '<ul class="gallery">';
            foreach($dataUnivers as $value) {
                echo '<li class="item"><a href="'.findTargetRoute(156).'&idUnivers='.$value['idUnivers'].'">Name :'.$value['nameUnivers'].' - Technology Level: '.$value['nt'].'</a></li>';
                $dataFactions = $this->listOfFaction ($value['idUnivers']);
                $this->displayFactionsOfOneUnivers ($dataFactions);
            }
        echo '</ul>';
    }
    public function addUniversForm ($idNav) {
        echo '<form class="customerForm" action="'.encodeRoutage(66).'" method="post">';
            echo '<label for="nameUnivers">Name univers :</label>';
            echo '<input id="nameUnivers" name="nameUnivers" placeholder="New name univers"/>';
            echo '<label for="nt">Level Technologique</label>';
            echo '<select for="nt" name="nt">';
                for ($i=0; $i <count($this->nt) ; $i++) { 
                    echo '<option value="'.$i.'">'.$this->nt[$i].'</option>';
                    if($i == 8) {
                        echo '<option value="'.$i.'" selected>'.$this->nt[$i].'</option>';
                    }
                }
            echo '</select>';
            echo '<button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Creat news univers</button>';
        echo '</form>';
        echo '<article class="customerForm">';
        $this->numberOfUnivers(1);
        $this->displayListOfYourUnivers (1);
        echo '</article>';
    }
    public function displayOneUniversUpdateForm ($idUnivers, $valid, $idNav) {
        $dataUnivers = $this->getOneUnivers ($idUnivers, $valid);
       
        echo '<form class="customerForm" action="'.encodeRoutage(67).'" method="post">';
            echo '<h3>Presentation of univers</h3>';
            echo '<p>Name :'.$dataUnivers[0]['nameUnivers'].'</p>
                  <p>Technology level: '.$dataUnivers[0]['nt'].'</p>';
            echo '<label for="nameUnivers">Name univers :</label>';
            echo '<input id="nameUnivers" name="nameUnivers" value="'.$dataUnivers[0]['nameUnivers'].'"/>';
            echo '<label for="nt">Level Technologique</label>';
            echo '<select for="nt" name="nt">';
                for ($i=0; $i <count($this->nt) ; $i++) { 
                    echo '<option value="'.$i.'">'.$this->nt[$i].'</option>';
                    if($i == $dataUnivers[0]['nt']) {
                        echo '<option value="'.$i.'" selected>'.$this->nt[$i].'</option>';
                    }
                }
            echo '</select>';
            echo '<input type="hidden" name="id" value="'.$dataUnivers[0]['idUnivers'].'"/>';
            echo '<button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Update univers</button>';
        echo '</form>';
        echo '<form class="customerForm" action="'.encodeRoutage(68).'" method="post">';
        echo '<input type="hidden" name="id" value="'.$dataUnivers[0]['idUnivers'].'"/>';
        echo '<button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Delete '.$dataUnivers[0]['nameUnivers'].'</button>';
    echo '</form>';
    }
}
