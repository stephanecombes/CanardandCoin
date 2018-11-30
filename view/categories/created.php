<?php
echo '<p>La catégorie ' . $id . 'a bien été créé(e) !</p>';
require File::build_path(array('view', 'categorie', 'list.php'));
