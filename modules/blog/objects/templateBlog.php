<?php
require ('modules/blog/objects/PresentationHTML.php');
class TemplateBlog extends PresentationHTML
{
    public function displayLastArticle () {
        $data = $this->getLastArticle ();
        echo $this->htmlText ($data['article']);
    }
}
