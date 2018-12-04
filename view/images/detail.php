<?php
require_once File::build_path(array('model', 'ModelImages.php'));
?>
<h1>Détail de l'image</h1>
<div class="general_detail_div">
  <div class="img_detail_div">
    <img class="img_detail" src="<?php echo $im->get('lienImage'); ?>">
  </div>
  <div class="descr_img_detail_div">
    <h2>Description : </h2>
    <?php echo $im->get('descriptionImage'); ?>
  </div>
</div>
