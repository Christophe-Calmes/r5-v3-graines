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
  
    if($fixMiniature == 0) {
        echo '</section>';
        require ('sources/specialRules/objects/TemplatesSpecialRules.php');
        $specialRuleForMiniature = new TemplatesSpecialRules ();
        echo '<section class="flex-rows">';
            echo '<article>';
                $specialRuleForMiniature->displaySRforMiniature ($idMiniature, $idNav);
            echo '</article>';
        echo '</section>';
    }

echo '</section>';