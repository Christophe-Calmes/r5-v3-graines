<?php
require ('sources/miniatures/objets/templatesMiniatures.php');
$displayMiniatureForm = new templatesMiniatures ();
$idMiniature = filter($_GET['idMiniature']);
$fixMiniature = $displayMiniatureForm->miniatureFix ($idMiniature);

echo '<section class="flex-rows">';
    if($fixMiniature == 0) {
        echo '<article>';
            $displayMiniatureForm->updateMiniatureByUser ($idMiniature, 1, $idNav, $fixMiniature);
        echo '</article>';
    }
    echo '<article>';
        $displayMiniatureForm->displayOneMiniature ($idMiniature, 1, $fixMiniature);
    echo '</article>';

echo '</section>';