<?php
require ('sources/administration/objet/SQLAdministration.php');
final class TemplateAdministration extends SQLAdministration
{
    public function displayMiniaturePicture ($firstPage, $nbrPicture, $idNav) {
        $dataPictureOfOnePage = $this-> getAllMiniaturePictureOfOnePage ($firstPage, $nbrPicture);
        echo '<ul class="gallery">';
        foreach ($dataPictureOfOnePage as  $value) {
            echo '<li class="item">
                    <p>'.$value['login'].'</p>
                    <p>'.$value['prenom'].' '.$value['nom'].' </p>
                    <img class="imgMini" src="sources/pictures/miniaturesPictures/'.$value['namePicture'].'" alt="'.$value['namePicture'].'"/>
                     <form action="'.encodeRoutage(135).'" method="post">
                        <input type="hidden" name="idMiniature" value="'.$value['id'].'"/>
                        <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Effacer</button>
                    </form>
                </li>';
        }
        echo '</ul>';
    }
    public function displayVehiclesPicture ($firstPage, $nbrPicture, $idNav) {
        $dataPictureOfOnePage = $this-> getAllVehiclesPictureOfOnePage ($firstPage, $nbrPicture);
        echo '<ul class="gallery">';
        foreach ($dataPictureOfOnePage as  $value) {
            echo '<li class="item">
                    <p>'.$value['login'].'</p>
                    <p>'.$value['prenom'].' '.$value['nom'].' </p>
                    <img class="imgMini" src="sources/pictures/miniaturesPictures/'.$value['namePicture'].'" alt="'.$value['namePicture'].'"/>
                     <form action="'.encodeRoutage(136).'" method="post">
                        <input type="hidden" name="idVehicle" value="'.$value['id'].'"/>
                        <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Effacer</button>
                    </form>
                </li>';
        }
        echo '</ul>';
    }
}


// 