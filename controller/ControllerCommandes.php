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
        if (Session::is_admin()) {
            $pagetitle = 'Modification d\'une commande';
            $view = 'update';
            require_once File::build_path(array('view', 'view.php'));
        } else {
            ControllerUtilisateurs::connect();
        }
    }

    public static function updated()
    {
        $u = ModelCommandes::select($_GET['idCommande']);
        if (Session::is_user($u->get('idUtilisateur'))) {
            $pagetitle = 'Modification d\'une commande';
            $view = 'update';
            $_GET['idCommande'] = $_POST['idCommande'];
            require_once File::build_path(array('view', 'view.php'));

            $pagetitle = 'Liste des commandes';
            $tab_u = ModelCommandes::selectAll();
            $view = 'updated';
            $data = array(
                'idCommande' => $_POST['idCommande'],
                'idUtilisateur' => $_POST['idUtilisateur'],
                'dateCommande' => $_POST['dateCommande'],
                'idStatut' => $_POST['idStatut'],
                'montantCommande' => $_POST['montantCommande'],
                'idAdresseLivraison' => $_POST['idAdresseLivraison'],
                'idAdresseFacturation' => $_POST['idAdresseFacturation'],
            );
            ModelCommandes::update($data);
            require_once File::build_path(array('view', 'view.php'));
        } else {
            ControllerUtilisateurs::connect();
        }
    }

    public static function command(){
      $idUser = $_SESSION['idUtilisateur'];
      $date = date('Y/m/d');
      $sqlDate = str_replace('/', '-', $date);
      $statut = 1;
      $montant = ControllerProduits::totalPrice();

      $data = $arrayName = array('dateCommande' => $sqlDate ,
                                'idStatut' => $statut,
                                'idUtilisateur' => $idUser,
                                'montantCommande' => $montant,
                              );


      $commande = new ModelCommandes($data);
      $commande->save();

      $new_commande = Model::$PDO->query("SELECT * FROM cac_commandes ORDER BY 'date' DESC, 'time' DESC LIMIT 1");
      $new_commande->setFetchMode(PDO::FETCH_CLASS, 'ModelCommandes');
      $fetchCommande = $new_commande->fetchAll();
      $objectCommande = $fetchCommande[0];
      $idCommande = $objectCommande->get('idCommande');

      foreach ($_SESSION['panier']['idProduit'] as $key => $value) {
        $positionProduit = array_search($value, $_SESSION['panier']['idProduit']);

        $idProduit = $value;
        $quantitéProduits = $_SESSION['panier']['quantity'][$positionProduit];

        $sql = 'INSERT INTO cac_lignecommande(idCommande, idProduit, quantitéProduits) VALUES(:idCommande, :idProduit, :quantitéProduits)';
        $req_prep = Model::$PDO->prepare($sql);

        $values = array(
          'idCommande' => $idCommande,
          'idProduit' => $idProduit,
          'quantitéProduits' => $quantitéProduits,
        );

        var_dump($values);
        var_dump($req_prep);
        $req_prep->execute($values);
      }
    }
}
