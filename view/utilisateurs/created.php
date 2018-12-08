<?php
echo '<p>L\'Utilisateur a bien été créé(e) !</p>';
echo '<p>Un courriel d\'activation a été envoyé</p>';
require File::build_path(array('view', 'utilisateurs', 'connect.php'));
