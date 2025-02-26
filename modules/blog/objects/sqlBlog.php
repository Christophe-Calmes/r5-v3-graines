<?php
require_once('libs/parsedown/src/Parsedown.php');
/* 
require_once 'chemin/vers/votre/Parsedown.php'; // Remplacez par le chemin réel

$markdownText = $_POST['mon_textarea']; // ou votre récupération de données
$parsedown = new Parsedown();
$html = $parsedown->text($markdownText);

echo $html;
*/
class SQLBlog 
{
    protected $parsedown;
    public function __construct () {
        $this->parsedown = new Parsedown();
    }
}
