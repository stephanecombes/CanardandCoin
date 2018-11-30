<?php
if (isset($_GET['idCategorie'])) {
    echo 'La catégorie ' . $_GET['idCategorie'] . ' n\'est pas connue';
} else {
    echo 'Action inconnue !';
}
