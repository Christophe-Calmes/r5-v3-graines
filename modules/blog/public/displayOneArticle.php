<?php
// findTargetRoute(214, 215, 216, 215)
require('modules/blog/objects/templateBlog.php');
$idArticle = filter($_GET['idArticle']);
print_r($idArticle);
$blog = new TemplateBlog ();
$blog->displayOneArticleOfBlog ($idArticle, 1);
