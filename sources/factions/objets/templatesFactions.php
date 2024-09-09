<?php
require('sources/factions/objets/sqlFactions.php');
class templatesFactions extends SQLFactions
{
    private function selectUnivers () {
        $dataUnivers = $this->listOfYourUnivers (1);
        echo '<label for="idUnivers">Univers of your new faction</label>';
        echo '<select id="idUnivers" name="idUnivers">';
            foreach ($dataUnivers as $value) {
                echo '<option value="'.$value['idUnivers'].'">'.$value['nameUnivers'].' - TL '.$value['nt'].'</option>';
            }
        echo '</select>';
    }
    public function formFactionPublic ($idNav) {
        echo '<form class="customerForm" action="'.encodeRoutage(69).'" method="post">';
        echo '<label for="nomFaction">Name Faction :</label>';
        echo '<input id="nomFaction" name="nomFaction" placeholder="New name faction"/>';
        $this->selectUnivers ();
        echo '<button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Creat news faction</button>';
        echo '</form>';
        $this->displayListOfYourUnivers (1);
    }
    public function displayFactionAdmin ($idNav, $type) {
        if($type == 0) {
            $message = "Delete";
            $adress = 70;
        } else {
            $message = "Update";
            $adress = 71;
        }
        $listOfUserUnivers = $this->listOfYourUnivers (1);
        echo '<article class="gallery">';
            foreach ($listOfUserUnivers as $value) {
                echo '<div class="item"><h4>'.$value['nameUnivers'].'</h4>';
                $listFactionOfOneUnivers = $this->listOfFaction ($value['idUnivers']);
                echo '<aside class="listeProfil">';
                    foreach ($listFactionOfOneUnivers as $value) {
                        echo '<div>';
                        echo '<form class="formItem" action="'.encodeRoutage($adress).'" method="post">';
                        echo '<strong>'.$value['nomFaction'].'</strong>';
                        if($type == 1) {
                            echo '<label for="nomFaction">Name Faction :</label>';
                            echo '<input id="nomFaction" name="nomFaction" value="'.$value['nomFaction'].'"/>';
                        }
                        echo '<input type="hidden" name="id" value="'.$value['idFaction'].'"/>';
                        echo '<button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">'.$message.'</button>';
                        echo '</form>';
                        echo'</div>';
                    }
                echo '</aside>';
                echo '</div>';

            }
        echo '</article>';
    }
    public function listOfUserFaction ($type) {
        if($type == 0) {
            $message = "See all weapons";
            $adress = 180;
        } else {
            $message = "See all miniatures";
            $adress = 187;
        } 

        $listOfUserUnivers = $this->listOfYourUnivers (1);
        echo '<article class="gallery">';
            foreach ($listOfUserUnivers as $value) {
                echo '<div class="item"><h4>'.$value['nameUnivers'].'</h4>';
                $listFactionOfOneUnivers = $this->listOfFaction ($value['idUnivers']);
                echo '<ul class="listeProfil">';
                    foreach ($listFactionOfOneUnivers as $value) {
                        echo '<li>
                                <a href="'.findTargetRoute($adress).'&idFaction='.$value['idFaction'].'">'.$message.'</a>
                                <strong>'.$value['nomFaction'].'</strong>
                            </li>';
                    }
                echo '</ul>';
                echo '</div>';

            }
        echo '</article>';
    }
}
