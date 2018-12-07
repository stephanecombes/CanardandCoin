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
        if (Session::is_admin()) {
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
                'prixProduit' => $_POST['prixProduit'],
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

    public static function createPanier()
    {
        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = array();
            $_SESSION['panier']['idProduit'] = array();
            $_SESSION['panier']['quantity'] = array();
            $_SESSION['panier']['prix'] = array();
        }
        return true;
    }

    public static function addArticle($idProduit, $quantity, $prix)
    {
        if (createPanier()) {
            $positionProduit = array_search($idProduit, $_SESSION['panier']['idProduit']);

            if ($positionProduit !== false) {
                $_SESSION['panier']['quantity'][$positionProduit] += 1;
            } else {
                array_push($_SESSION['panier']['idProduit'], $idProduit);
                array_push($_SESSION['panier']['quantity'], $quantity);
                array_push($_SESSION['panier']['prix'], $prix);
            }
        }
    }

    public static function removeArticle($idProduit)
    {
        if (createPanier()) {
            $temporaryPanier = array();
            $temporaryPanier['idProduit'] = array();
            $temporaryPanier['quantity'] = array();
            $temporaryPanier['prix'] = array();

            for ($i = 0; $i < count($_SESSION['panier']['idProduit']); $i++) {
                if ($_SESSION['panier']['idProduit'][$i] !== $idProduit) {
                    array_push($temporaryPanier['idProduit'], $_SESSION['panier']['idProduit'][$i]);
                    array_push($temporaryPanier['quantity'], $_SESSION['panier']['quantity'][$i]);
                    array_push($temporaryPanier['prix'], $_SESSION['panier']['prix'][$i]);
                }
            }
            $_SESSION['panier'] = $temporaryPanier;
            unset($temporaryPanier);
        }
    }

    public static function modifyQuantity($idProduit, $quantity)
    {
        if (createPanier()) {
            if ($quantity > 0) {
                $positionProduit = array_search($idProduit, $_SESSION['panier']['idProduit']);

                if ($positionProduit !== false) {
                    $_SESSION['panier']['quantity'][$positionProduit] = $quantity;
                }
            } else {
                removeArticle($idProduit);
            }
>>>>>>> 8fd4d83410e237f708b731f39e7812aa1e6a19d2
        }
    }

    public static function totalPrice()
    {
        $total = 0;
        for ($i = 0; $i < count($_SESSION['panier']['idProduit']); $i++) {
            $total += $_SESSION['panier']['quantity'][$i] * $_SESSION['panier']['prix'][$i];
        }
        return $total;
    }

    public function removePanier()
    {
        unset($_SESSION['panier']);
    }

    public static function toPanier()
    {
        if (isset($_SESSION['listProduit'])) {
            $actualSize = sizeOf($_SESSION['listProduit']);
            $_SESSION['listProduit'][$actualSize + 1] = $_GET['idProduit'];
        } else {
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
