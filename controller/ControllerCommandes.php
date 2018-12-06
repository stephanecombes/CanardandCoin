<?php
require_once File::build_path(array('model', 'ModelCommandes.php'));

class ControllerCommandes
{
    protected static $object = 'commandes';

    public static function read()
    {
        $pagetitle = 'Détail de la commande';
        $co = ModelCommandes::select($_GET['idCommande']);
        if ($co != false) {
            $view = 'detail';
            require File::build_path(array('view', 'view.php'));
        } else {
            $view = 'error';
            require File::build_path(array('view', 'view.php'));
        }
    }

    public static function readAll()
    {
        $pagetitle = 'Liste des commandes';
        $tab = ModelCommandes::selectAll();
        $view = 'list';
        require_once File::build_path(array('view', 'view.php'));
    }

    public static function create()
    {
        $pagetitle = 'Création d\'une commande';
        $view = 'create';
        require File::build_path(array('view', 'view.php'));
    }

    public static function created()
    {
        $pagetitle = 'Commande créée';
        $view = 'created';
        $commande = new ModelCommandes($_POST);
        $commande->save();
        ControllerCommandes::readAll();
    }
}

    public static function delete()
    {
        $u = ModelCommandes::select($_GET['idCommande']);
        if (Session::is_admin()) {
            $id = $_GET['idCommande'];
            $pagetitle = 'Suppression d\'une commande';
            $view = 'deleted';
            ModelCommandes::delete($id);
            $tab_u = ModelCommandes::selectAll();
            require_once File::build_path(array('view', 'view.php'));
        } else {
            ControllerUtilisateurs::connect();
        }
    }

        public static function update()
    {
        $u = ModelCommandes::select($_GET['idCommande']);
        if (Session::is_admin()) {
            $pagetitle = 'Modification d\'une commande';
            $view = 'update';
            require_once File::build_path(array('view', 'view.php'));
        } else {
            ControllerUtilisateurs::connect();
        }
    }

    