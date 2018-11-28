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
