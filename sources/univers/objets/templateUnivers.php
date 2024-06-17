<?php
require ('sqlUnivers.php');

class templateUnivers extends sqlUnivers 
{

    public function __construct () {
        parent::__construct();
   
    }
    private function numberOfUnivers ($valid) {
        $numberOfUnivers = $this->countYourUnivers($valid);
        echo '<article>Your number of Univers = '.$numberOfUnivers[0]['nbrUnivers'].' / '.$this->maxOfUnivers.'</article>';
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
        $this->numberOfUnivers(1);
    }
   
}
