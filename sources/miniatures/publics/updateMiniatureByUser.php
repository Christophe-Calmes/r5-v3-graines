<?php
require ('sources/miniatures/objets/templatesMiniatures.php');
$displayMiniatureForm = new templatesMiniatures ();
$idMiniature = filter($_GET['idMiniature']);
echo '<section class="flex-rows">';
    echo '<article>';
        $displayMiniatureForm->updateMiniatureByUser ($idMiniature, 1, $idNav, 0);
    echo '</article>';
    echo '<article>';
        $displayMiniatureForm->displayOneMiniature ($idMiniature, 1, 0);
    echo '</article>';

echo '</section>';