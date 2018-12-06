<?php
require_once File::build_path(array('model', 'ModelImages.php'));

class ControllerImages
{
    protected static $object = 'images';

    public static function readAll()
    {
        $pagetitle = 'Liste des images';
        $tab = ModelImages::selectAll();
        $view = 'list';
        require_once File::build_path(array('view', 'view.php'));
    }

    public static function read()
    {
        $pagetitle = 'Détail de l\'image';
        $im = ModelImages::select($_GET['idImage']);
        if ($im != false) {
            $view = 'detail';
            require File::build_path(array("view", "view.php"));
        } else {
            $view = 'error';
            require File::build_path(array("view", "view.php"));
        }
    }

    public static function create()
    {
        $pagetitle = 'Création d\'une image';
        $view = 'create';
        require File::build_path(array("view", "view.php"));
    }

    public static function created()
    {
        $url_img = 'images/images_produits/' . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $url_img);
        $datas = array('lienImage' => $url_img,'descriptionImage' => $_POST['descriptionImage']);
        $image = new ModelImages($datas);
        $image->save();
        $pagetitle = 'Liste des images';
        $tab = ModelImages::selectAll();
        $view = 'created';
        require_once File::build_path(array('view', 'view.php'));
    }
}
