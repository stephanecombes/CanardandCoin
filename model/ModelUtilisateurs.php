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
    private $bloque;
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
            //$this->bloque = 0;
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

    public static function checkEmail($email)
    {
        $table_name = Conf::getPrefix() . static::$object;
        $sql = 'SELECT * FROM ' . $table_name . ' WHERE mailUtilisateur = :mailUtilisateur_tag;';
        $rep_prep = Model::$PDO->prepare($sql);
        $values = array('mailUtilisateur_tag' => $email);
        $rep_prep->execute($values);
        $tab_obj = $rep_prep->fetchAll(PDO::FETCH_OBJ);
        if (!empty($tab_obj)) {
            return true;
        } else {
            return false;
        }
    }
}
