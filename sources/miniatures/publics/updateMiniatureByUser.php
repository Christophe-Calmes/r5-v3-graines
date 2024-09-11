<?php
require ('sources/miniatures/objets/templatesMiniatures.php');
$displayMiniatureForm = new templatesMiniatures ();
$idMiniature = filter($_GET['idMiniature']);
echo '<section class="flex-rows">';
    echo '<article>';
        $displayMiniatureForm->updateMiniatureByUser ($idMiniature, 1, $idNav);
    echo '</article>';
    echo '<article>';
        $displayMiniatureForm->displayOneMiniature ($idMiniature, 1);
    echo '</article>';

echo '</section>';