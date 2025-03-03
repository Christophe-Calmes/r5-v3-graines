<form class="customerForm" action="<?php echo encodeRoutage(134); ?>" method="post" enctype="multipart/form-data">
    <label for="altImg">Alternate text</label>
    <input id="altImg" type="text" name="altImg" placeholder="Alt text for picture"/>
    <label for="name_picture">Picture for blog</label>
    <input id="name_picture" type="file" name="name_picture" accept="image/png, image/jpeg, image/webp"/>
    <button class="buttonForm" type="submit" name="idNav" value="<?php echo $idNav; ?>">Record picture</button>
</form>
<?php
require ('modules/blog/objects/templateBlog.php');
$displayPicture = new TemplateBlog ();
$displayPicture->displayImgCode (1);