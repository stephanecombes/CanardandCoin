<?php
echo '<p>La categorie ' . $idCategorie . 'a bien été supprimée !</p>';
require File::build_path(array('view', 'categorie', 'list.php'));
