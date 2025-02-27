<?php
require ('modules/blog/objects/PresentationHTML.php');
require ('functions/functionDateTime.php');
class TemplateBlog extends PresentationHTML
{
    private function updateSubject ($data, $idNav) {
        echo '<form class="listRow" action="'.encodeRoutage(131).'" method="post">';
        echo '<label for="subject">Categorie</label>';
        echo '<input id="subject" type="text" name="subject" value="'.$data['subject'].'"/>';
        echo '<input type="hidden" name="id" value="'.$data['id'].'"/>';
        echo '<label for="valid">Valid</label>';
            echo '<select name="valid">';
                $array_valid = ['No valid', 'Valid'];
                for ($i=0; $i <=1 ; $i++) { 
                    if($data['valid'] == $i) {
                        echo '<option value="'.$i.'" selected>'. $array_valid[$i].'</option>';
                    } else {
                        echo '<option value="'.$i.'">'. $array_valid[$i].'</option>';
                    }
                    
                }
            echo '</select>';
        echo '<button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Update</button>';
        echo '</form>';
    }
    public function displayLastArticle () {
        $data = $this->getLastArticle ();
        echo '<h2>'.$data['title'].'</h2>';
        echo '<h5>Catégorie : '.$data['subject'].'</h5>';
        echo '<p>'.brassageDate($data['creat_date']).'</p>';
        echo $this->htmlText ($data['article']);
    }
    public function displayUpdateCategorie ($valid, $idNav) {
        $dataCategorie = $this->getAllCategories ($valid);
        if($valid ==1) {
            $title = '<h4>Catégorie valide</h4>';
        } else {
            $title = '<h4>Catégorie non valide</h4>';
        }
        if(!empty($dataCategorie)) {
                echo $title;
                echo '<ul class="listeProfil">';
                    foreach ($dataCategorie as $value) {
                        echo '<li class="formItem"><strong>'.$value['subject'].'</strong>';
                            echo ' Creat date : '.dateHeure($value['creat_date']);
                            echo ' Update date: '.dateHeure($value['update_date']);
                            $this->updateSubject ($value, $idNav);
                        echo '</li>';
                    }
                echo '</ul>';
            } else {
                echo $title;
                echo'<h5>No data</h5>';
            }
    }
    public function selectSubject () {  
        $dataCategorie = $this->getAllCategories (1);
        if(!empty($dataCategorie)) {
            echo '<label for="id_subject">Catégorie</label>';
            echo '<select id="id_subject" name="id_subject">';
                foreach ($dataCategorie as $value) {
                    echo '<option value="'.$value['id'].'">'.$value['subject'].'</option>';
                }
            echo ' </select>';
        }
       
    }
       
}
