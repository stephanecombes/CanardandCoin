<?php
require_once File::build_path(array('model', 'ModelProduits.php'));

class ControllerProduits
{
    protected static $object = 'produits';

    public static function read()
    {
        $pagetitle = 'Détail du produit';
        $p = ModelProduits::select($_GET['idProduit']);
        if ($p != false) {
            $view = 'detail';
            require File::build_path(array('view', 'view.php'));
        } else {
            $view = 'error';
            require File::build_path(array('view', 'view.php'));
        }
    }

    public static function readAll()
    {
        $pagetitle = 'Liste des produits';
        $tab = ModelProduits::selectAll();
        $view = 'list';
        require_once File::build_path(array('view', 'view.php'));
    }

    public static function create()
    {
        $pagetitle = 'Création de produit';
        $view = 'update';
        require File::build_path(array("view", "view.php"));
    }

    public static function created()
    {
        $pagetitle = 'Produit créé';
        $view = 'created';
        $produit = new ModelProduits($_POST);
        $produit->save();
        ControllerProduits::readAll();
    }

    public static function update()
    {
      if(Session::is_admin()) {
        $pagetitle = 'Modification d\'un produit';
        $view = 'update';
        require_once File::build_path(array('view', 'view.php'));
      } else {
            ControllerUtilisateurs::connect();
      }
    }

    public static function updated()
    {
      $u = ModelProduits::select($_GET['idProduit']);
        if (Session::is_admin()) {
                $pagetitle = 'Modification d\'un produit';
                $view = 'update';
                $_GET['idProduit'] = $_POST['idProduit'];
                require_once File::build_path(array('view', 'view.php'));

                $pagetitle = 'Liste des produits';
                $tab_u = ModelProduits::selectAll();
                $view = 'updated';
                $data = array(
                    'idProduit' => $_POST['idProduit'],
                    'nomProduit' => $_POST['nomProduit'],
                    'idCategorie' => $_POST['idCategorie'],
                    'couleurProduit' => $_POST['couleurProduit'],
                    'descriptionProduit' => $_POST['descriptionProduit'],
                    'tailleProduit' => $_POST['tailleProduit'],
                    'poidsProduit' => $_POST['poidsProduit'],
                    'ageProduit' => $_POST['ageProduit'],
                );
                ModelProduits::update($data);
                require_once File::build_path(array('view', 'view.php'));
        } else {
            ControllerUtilisateurs::connect();
        }
    }

    public static function delete()
    {
      if (Session::is_admin()) {
          $id = $_GET['idProduit'];
          $pagetitle = 'Suppression d\'un produit';
          $view = 'deleted';
          ModelProduits::delete($id);
          $tab_u = ModelProduits::selectAll();
          require_once File::build_path(array('view', 'view.php'));
      } else {
          ControllerUtilisateur::connect();
      }
    }

    public static function toPanier(){
      if(isset($_SESSION['listProduit'])){
        $actualSize = sizeOf($_SESSION['listProduit']);
        $_SESSION['listProduit'][$actualSize + 1] = $_GET['idProduit'];
      }else{
        $_SESSION['listProduit'][0] = $_GET['idProduit'];
      }
      $view = 'panier';
      require_once File::build_path(array('view', 'view.php'));
    }

    public static function addImage()
    {
      $pagetitle = 'Ajouter une image';
      $view = 'addImage';
      require File::build_path(array("view", "view.php"));
    }

    public static function imageAdded()
    {
      $pagetitle = 'Image ajoutée';
      $view = 'imageAdded';

      $req_sql = 'INSERT INTO cac_galerieimage(idProduit, idImage) VALUES(:idProduit, :idImage)';
      $req_sql_prep = Model::$PDO->prepare($req_sql);

      $values = array(
        'idProduit' => $_POST['idProduit'],
        'idImage' => $_POST['idImage'],
      );

      $req_sql_prep->execute($values);

      require File::build_path(array("view", "view.php"));
    }
}
