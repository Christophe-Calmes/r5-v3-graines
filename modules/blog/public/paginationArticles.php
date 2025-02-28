<?php
require('modules/blog/objects/templateBlog.php');
$idSubject = filter($_GET['idSubject']);
$blog = new TemplateBlog ();
$blog->menuCategorieBlog ();
