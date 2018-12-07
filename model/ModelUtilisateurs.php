<?php
require_once File::build_path(array('model', 'Model.php'));

class ModelUtilisateurs extends Model
{

    //attributs.
    private $idUtilisateur;
    private $nomUtilisateur;
    private $prenomUtilisateur;
    private $mailUtilisateur;
    private $ageUtilisateur;
    private $mdpUtilisateur;
    private $idRole;
    protected static $object = 'utilisateurs';
    protected static $primary = 'idUtilisateur';

    public function __construct($data = null)
    {
        if (!is_null($data)) {
            if (isset($data['idUtilisateur'])) {
                $this->$idUtilisateur = $data['idUtilisateur'];
            }
            $this->nomUtilisateur = $data['nomUtilisateur'];
            $this->prenomUtilisateur = $data['prenomUtilisateur'];
            $this->mailUtilisateur = $data['mailUtilisateur'];
            $this->ageUtilisateur = $data['ageUtilisateur'];
            $this->mdpUtilisateur = $data['mdpUtilisateur'];
            $this->idRole = $data['idRole'];
        }
    }

    public function get($attribute)
    {
        return $this->$attribute;
    }

    public static function checkPassword($login, $mot_de_passe_chiffre)
    {
        $u = ModelUtilisateurs::select($login);
        if ($u != false) {
            if ($mot_de_passe_chiffre == $u->get('mdpUtilisateur')) {
                unset($u);
                return true;
            }
        }
        unset($u);
        return false;
    }

    // Verifie si une adresse email existe deja dans la base de donnée
    public static function checkEmail($email)
    {
        try {
            $table_name = Conf::getPrefix() . static::$object;
            $sql = 'SELECT * FROM ' . $table_name . ' WHERE mailUtilisateur = :mailUtilisateur_tag;';
            $req_prep = Model::$PDO->prepare($sql);
            $values = array('mailUtilisateur_tag' => $email);
            $req_prep->execute($values);
            $tab_obj = $req_prep->fetchAll(PDO::FETCH_OBJ);
            if (!empty($tab_obj)) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href="index.php"> retour a la page d\'accueil </a>';
            }
        }
    }

    // Trouve un id utilisateur à partir d'une adresse email
    public static function getIdbyEmail($email)
    {
        $table_name = conf::getPrefix() . static::$object;
        $sql = 'SELECT idUtilisateur FROM ' . $table_name . ' WHERE mailUtilisateur = :mailUtilisateur_tag;';
        $req_prep = Model::$PDO->prepare($sql);
        $values = array('mailUtilisateur_tag' => $email);
        $req_prep->execute($values);
        $tab_obj = $req_prep->fetchALL(PDO::FETCH_OBJ);

        if ($empty($tab_obj)) {
            return $tab_obj[0];
        } else {
            return false;
        }
    }
}
