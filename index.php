<?php

session_start();

$DS = DIRECTORY_SEPARATOR;
$ROOT_FOLDER = __DIR__;

require_once $ROOT_FOLDER . $DS . 'lib' . $DS . 'File.php';

if (!isset($_GET['action'])) {
    $_GET['action'] = 'readAll';
}

require_once File::build_path(array('controller', 'routeur.php'));
