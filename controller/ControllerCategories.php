<?php
require_once File::build_path(array('model', 'ModelCategories.php'));

class ControllerCategories
{
    protected static $object = 'categories';

    public static function read()
    {
        $pagetitle = 'Détail de la catégorie';
        $c = ModelCategories::select($_GET['idCategorie']);
        if ($c != false) {
            $view = 'detail';
            require File::build_path(array('view', 'view.php'));
        } else {
            $view = 'error';
            require File::build_path(array('view', 'view.php'));
        }
    }

    public static function readAll()
    {
        $pagetitle = 'Liste des catégories';
        $tab = ModelCategories::selectAll();
        $view = 'list';
        require_once File::build_path(array('view', 'view.php'));
    }

    public static function create()
    {
        $pagetitle = 'Création d\'catégorie';
        $view = 'create';
        require File::build_path(array("view", "view.php"));
    }

    public static function created()
    {
        $pagetitle = 'Catégorie créée';
        $view = 'created';
        $categorie = new ModelCategories($_POST);
        $categorie->save();
        ControllerCategories::readAll();
    }
}
