<?php
echo '<p>La catégorie ' . $idCategorie . ' a bien été modifiée !</p>';
require File::build_path(array('view', 'categorie', 'list.php'));
